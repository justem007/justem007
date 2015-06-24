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

//Route::pattern('id', '[0-9]+');
//
//Route::get('user/{id?}', function($id = null){
//    if($id)
//        return "Olá $id";
//    return "Não existe ID";
//});

//Route::get('exemplo', 'WelcomeController@exemplo');
//Route::get('exemplo2', 'WelcomeController@exemplo2');
//
//Route::any('/exemplo5', function (){
//
//});

//Route::get('/exemplo3', function () {
//    return "oi";
//});
//
//Route::post('/exemplo3', function () {
//    return "oi";
//});

Route::get('category/{category}', function (\CodeCommerce\Category $category) {
        return $category->name;
});

//Route::get('categories', ['as'=>'categories', 'uses'=>'CategoryController@index']);
//Route::post('categories', ['as'=>'categories.store', 'uses'=>'CategoryController@store']);
//Route::get('categories/create', ['as'=>'categories.create', 'uses'=>'CategoryController@create']);
//Route::get('categories/{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoryController@destroy']);
//Route::get('categories/{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoryController@edit']);
//Route::post('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoryController@update']);

//Route::get('produtos', ['as'=> 'produtos', function () {
//
////    echo Route::currrentRouteName();
//    return "Produtos";
//}]);

//redirect()->route('produtos');
//
//echo route('produtos');die;

Route::group(['prefix'=> 'admin'],function () {

    Route::group(['prefix'=> 'categories'], function () {
        Route::get('/','AdminCategoriesController@index');
        Route::get('create','AdminCategoriesController@create');
        Route::get('store','AdminCategoriesController@store');
        Route::get('show','AdminCategoriesController@show');
        Route::get('edit','AdminCategoriesController@edit');
        Route::get('update','AdminCategoriesController@update');
        Route::get('destroy','AdminCategoriesController@destroy');
    });

   Route::group(['prefix'=> 'products'], function () {
       Route::get('/','AdminProductsController@index');
       Route::get('create','AdminProductsController@create');
       Route::get('store','AdminProductsController@store');
       Route::get('show','AdminProductsController@show');
       Route::get('edit','AdminProductsController@edit');
       Route::get('update','AdminProductsController@update');
       Route::get('destroy','AdminProductsController@destroy');
   });

});


//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/exemplo4', function () {
    return "oi match";
});