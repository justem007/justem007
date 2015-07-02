<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductsRequest;
use CodeCommerce\Tag;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use League\Flysystem\AwsS3v3\AwsS3Adapter;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $productModel;

    public function __construct(Product $productModel,Tag $tagModel )
    {
        $this->middleware('guest');
        $this->productModel = $productModel;
        $this->tagModel = $tagModel;
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

    public function store(ProductsRequest $request)
    {
        $inputTags = explode(',', $request->get('tags'));

        $input = $request->all();

        $input['featured'] = isset($input['featured']) ? 1 : 0;
        $input['recommend'] = isset($input['recommend']) ? 1 : 0;

        $inputTags = explode(',', $input['tags']);
        $newTagsRelatedToProduct = $this->extractTagsFromInput($inputTags);

        $product = $this->productModel->fill($input);
        $product->save();

        $product->tags()->attach($newTagsRelatedToProduct);


        return redirect()->route('products');

    }

    public function edit($id, Category $category)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');

        return view('products.edit', compact('product', 'categories'));

    }

    public function update(Request $request  ,$id)
    {

        $input = $request->all();

        $inputTags = explode(',', $input['tags']);

        $newTagsRelatedToProduct = $this->extractTagsFromInput($inputTags);

        $product = $this->productModel->find($id);
        $product->update($input);

        $product->tags()->sync($newTagsRelatedToProduct);

        return redirect()->route('products');

    }

    public function destroy($id)
    {
        $imagesToDelete = $this->productModel->find($id)->images;

        foreach($imagesToDelete as $image) {

            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);

            $image->delete();
        }

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

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists('/uploads/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
        
        }

    private function extractTagsFromInput($inputTags)
    {
        $newTagsRelatedToProduct = [];

        foreach ($inputTags as $tag) {
            $tag = strtolower(trim($tag, ' .;-!?#$&@*()|+=_{}[]^~'));

            $newTag = new Tag(['name' => $tag]);

            $tagAlreadyExists = $this->tagModel->where('name', '=', $tag)->first();

            if (!isset($tagAlreadyExists)) {
                $newTag->save();
                array_push($newTagsRelatedToProduct, $newTag->id);
            } else {
                array_push($newTagsRelatedToProduct, $tagAlreadyExists->id);
            }
        }
        return $newTagsRelatedToProduct;
    }

}