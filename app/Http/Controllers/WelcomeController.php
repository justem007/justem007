<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Routing\Controller;


class WelcomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $categories;

    private $products;

    public function __construct(Category $category, Product $product)
    {
        $this->middleware('guest');

        $this->categories = $category;

        $this->products = $product;
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function exemplo()
    {
        $categories = $this->categories->all();
        return view('exemplo', compact('categories'));
    }

    public function exemplo2()
    {
        $products = $this->products->all();
        return view('exemplo2', compact('products'));
    }

}