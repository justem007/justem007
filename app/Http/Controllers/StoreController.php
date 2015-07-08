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
        //$tags = $this->tagModel->find($id);

        return view('store.category', compact('categories', 'category', 'products', 'tags'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $products = Product::find($id);
        $tags= $products->tags()->get();

        return view('store.product', compact('categories', 'products','tags'));
    }
    public function tag($id)
    {
//        $categories = $this->categoryModel->all();
//        $products   = $this->productModel->ofTag($tags->id)->get();
//        //$products = $tags->products;
//        $tags = $this->tagModel->find($id);
//
//        return view('store.tag', compact('categories', 'products', 'tags'));

        $categories = Category::all();
        $tag = Tag::find($id);
        $products = $tag->products;
        return view('store.tag', compact('categories', 'products', 'tag'));


    }
}