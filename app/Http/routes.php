<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix'=>'admin', 'where'=>['id'=>'[0-9]+']], function ()
{


    Route::group(['prefix'=> 'categories'], function () {
        Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::post('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);


    });


    Route::group(['prefix'=> 'products'], function () {
        Route::get('/', ['as'=>'products', 'uses'=>'ProductController@index']);
        Route::post('/', ['as'=>'products.store', 'uses'=>'ProductController@store']);
        Route::get('create', ['as'=>'products.create', 'uses'=>'ProductController@create']);
        Route::get('{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductController@destroy']);
        Route::get('{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductController@edit']);
        Route::post('{id}/update', ['as'=>'products.update', 'uses'=>'ProductController@update']);

            Route::group(['prefix'=> 'images'], function () {
                Route::get('{id}/product', ['as'=>'products.images', 'uses'=>'ProductController@images']);
                Route::get('create/{id}/product', ['as'=>'products.images.create', 'uses'=>'ProductController@createImage']);
                Route::post('store/{id}/product', ['as'=>'products.images.store', 'uses'=>'ProductController@storeImage']);
                Route::get('destroy/{id}/image', ['as'=>'products.images.destroy', 'uses'=>'ProductController@destroyImage']);

        });
    });

});

Route::get('home', 'HomeController@index');

Route::get('categories', 'CategoriesController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
    return view('welcome');
});


//Route::get('categories', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
//Route::post('categories', ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
//Route::get('categories/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
//Route::get('categories/{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
//Route::get('categories/{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
//Route::post('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
//
//Route::get('products', ['as'=>'products', 'uses'=>'ProductController@index']);
//Route::post('products', ['as'=>'products.store', 'uses'=>'ProductController@store']);
//Route::get('products/create', ['as'=>'products.create', 'uses'=>'ProductController@create']);
//Route::get('products/{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductController@destroy']);
//Route::get('products/{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductController@edit']);
//Route::post('products/{id}/update', ['as'=>'products.update', 'uses'=>'ProductController@update']);

//Route::pattern('id', '[0-9]+');
//
//Route::get('user/{id?}', function($id = null){
//    if($id)
//        return "Olá $id";
//    return "Não existe ID";
//});
//
//Route::get('exemplo', 'WelcomeController@exemplo');
//Route::get('exemplo2', 'WelcomeController@exemplo2');
//
//Route::any('/exemplo5', function (){
//
//});
//
//Route::get('/exemplo3', function () {
//    return "oi";
//});
//
//Route::post('/exemplo3', function () {
//    return "oi";
//});
//
//Route::get('category/{category}', function (\CodeCommerce\Category $category) {
//        return $category->name;
//});


//Route::get('produtos', ['as'=> 'produtos', function () {
//
////    echo Route::currrentRouteName();
//    return "Produtos";
//}]);
//
//redirect()->route('produtos');
//
//echo route('produtos');die;
//
//Route::group(['prefix'=> 'admin'],function () {
//
//    Route::group(['prefix'=> 'categories'], function () {
//        Route::get('/','AdminCategoriesController@index');
//        Route::get('create','AdminCategoriesController@create');
//        Route::get('store','AdminCategoriesController@store');
//        Route::get('show','AdminCategoriesController@show');
//        Route::get('edit','AdminCategoriesController@edit');
//        Route::get('update','AdminCategoriesController@update');
//        Route::get('destroy','AdminCategoriesController@destroy');
//    });
//
//   Route::group(['prefix'=> 'products'], function () {
//       Route::get('/','AdminProductsController@index');
//       Route::get('create','AdminProductsController@create');
//       Route::get('store','AdminProductsController@store');
//       Route::get('show','AdminProductsController@show');
//       Route::get('edit','AdminProductsController@edit');
//       Route::get('update','AdminProductsController@update');
//       Route::get('destroy','AdminProductsController@destroy');
//   });
//
//});

//Route::group(['prefix'=> 'categories'], function () {
//    Route::get('/','CategoriesController@index');
//    Route::get('create','CategoriesController@create');
//    Route::get('{id}/destroy','CategoriesController@destroy');
//    Route::post('/','CategoriesController@store');
//
//
//    Route::get('show','CategoriesController@show');
//    Route::get('edit','CategoriesController@edit');
//    Route::get('update','CategoriesController@update');
//});
////
//
//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');

//Route::match(['get', 'post'], '/exemplo4', function () {
//    return "oi match";
//});