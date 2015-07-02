<?php
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

Route::get('/', 'StoreController@index');
Route::get('category/{id}', ['as'=>'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as'=>'store.product', 'uses' => 'StoreController@product']);
Route::get('tag/{tag}', ['as' => 'store.tags', 'uses' => 'StoreController@tag']);

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
