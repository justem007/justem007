<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $categoryModel;
    private $productModel;
    private $tagModel;

    public function __construct(Category $category, Product $product, Tag $tag) {
        $this->categoryModel = $category;
        $this->productModel  = $product;
        $this->tagModel      = $tag;
    }

    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        $categories = Category::all();
        $tags = $this->tagModel->all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend','tags'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();
//        $tags = $this->tagModel->ofCategory($category->id)->get();

        return view('store.category', compact('categories', 'category', 'products', 'tags'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        $tags= $product->tags()->get();

        return view('store.product', compact('categories', 'product','tags'));
    }

    public function tag(Tag $tags)
    {
        $categories = $this->categoryModel->all();
        $products   = $this->productModel->ofTag($tags->id)->get();
        return view('store.tag', compact('categories', 'products', 'tags'));
    }

}