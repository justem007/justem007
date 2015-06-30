<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\ProductsRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->middleware('guest');

        $this->productModel = $productModel;
    }

    public function index()
    {

        $products = $this->productModel->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {

        $categories = $category->lists('name', 'id');



        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductsRequest $request)
    {
        $input = $request->all();

        $input['featured'] = isset($input['featured']) ? 1 : 0;
        $input['recommend'] = isset($input['recommend']) ? 1 : 0;

        $product = $this->productModel->fill($input);

        $product->save();

        return redirect()->route('products');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->productModel->find($id);

        return view('products.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request  ,$id)
    {

        $this->productModel->find($id)->update($request->all());

        return redirect()->route('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect()->route('products');
    }

    public function images ($id)
    {
        $products = $this->productModel->find($id);

        return view('products.images', compact('products'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        
        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
        
        }

}