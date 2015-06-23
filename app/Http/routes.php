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

Route::get('/', 'WelcomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');
Route::get('exemplo2', 'WelcomeController@exemplo2');


Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');



Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



Route::get('/', function () {
    return view('welcome');
});
