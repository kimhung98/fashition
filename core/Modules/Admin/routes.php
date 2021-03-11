<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'prefix'        => 'admin',
    'namespace'     => 'Core\Modules\Admin\Controllers',
    'middleware' => ['web', 'login'],
], function () {
    Route::get('/dashboard', 'HomeController@index')->name('admin.index');

    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('create', 'UserController@create')->name('users.create');
        Route::post('store', 'UserController@store')->name('users.store');
        Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
        Route::post('update/{id}', 'UserController@update')->name('users.update');
        Route::get('destroy/{id}', 'UserController@destroy')->name('users.destroy');
    });

    Route::prefix('brands')->group(function () {
        Route::get('/', 'BrandController@index')->name('brands.index');
        Route::get('create', 'BrandController@create')->name('brands.create');
        Route::post('store', 'BrandController@store')->name('brands.store');
        Route::get('edit/{id}', 'BrandController@edit')->name('brands.edit');
        Route::post('update/{id}', 'BrandController@update')->name('brands.update');
        Route::get('destroy/{id}', 'BrandController@destroy')->name('brands.destroy');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index')->name('categories.index');
        Route::get('create', 'CategoryController@create')->name('categories.create');
        Route::post('store', 'CategoryController@store')->name('categories.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::post('update/{id}', 'CategoryController@update')->name('categories.update');
        Route::get('destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products.index');
        Route::get('create', 'ProductController@create')->name('products.create');
        Route::post('store', 'ProductController@store')->name('products.store');
        Route::get('edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::post('update/{id}', 'ProductController@update')->name('products.update');
        Route::get('destroy/{id}', 'ProductController@destroy')->name('products.destroy');
        Route::get('/details/{id}', 'ProductController@getDetails')->name('products.details');
    });

    Route::prefix('sizes')->group(function () {
        Route::get('/', 'SizeController@index')->name('sizes.index');
        Route::get('create', 'SizeController@create')->name('sizes.create');
        Route::post('store', 'SizeController@store')->name('sizes.store');
        Route::get('edit/{id}', 'SizeController@edit')->name('sizes.edit');
        Route::post('update/{id}', 'SizeController@update')->name('sizes.update');
        Route::get('destroy/{id}', 'SizeController@destroy')->name('sizes.destroy');
    });

    Route::prefix('repositories')->group(function () {
        Route::get('/', 'RepositoryController@index')->name('repositories.index');
        Route::get('create', 'RepositoryController@create')->name('repositories.create');
        Route::post('store', 'RepositoryController@store')->name('repositories.store');
        Route::get('edit/{id}', 'RepositoryController@edit')->name('repositories.edit');
        Route::post('update/{id}', 'RepositoryController@update')->name('repositories.update');
        Route::get('destroy/{id}', 'RepositoryController@destroy')->name('repositories.destroy');
        Route::get('{id}', 'RepositoryController@getAjax');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/', 'CustomerController@index')->name('customers.index');
        Route::get('create', 'CustomerController@create')->name('customers.create');
        Route::post('store', 'CustomerController@store')->name('customers.store');
        Route::get('edit/{id}', 'CustomerController@edit')->name('customers.edit');
        Route::post('update/{id}', 'CustomerController@update')->name('customers.update');
        Route::get('destroy/{id}', 'CustomerController@destroy')->name('customers.destroy');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', 'OrderController@index')->name('orders.index');
        Route::get('create', 'OrderController@create')->name('orders.create');
        Route::post('store', 'OrderController@store')->name('orders.store');
        Route::get('edit/{id}', 'OrderController@edit')->name('orders.edit');
        Route::post('update/{id}', 'OrderController@update')->name('orders.update');
        Route::get('destroy/{id}', 'OrderController@destroy')->name('orders.destroy');
    });

    Route::prefix('order-details')->group(function () {
        Route::get('/', 'OrderDetailsController@index')->name('order.details.index');
        Route::get('create', 'OrderDetailsController@create')->name('order.details..create');
        Route::post('store', 'OrderDetailsController@store')->name('order.details..store');
        Route::get('edit/{id}', 'OrderDetailsController@edit')->name('order.details..edit');
        Route::post('update/{id}', 'OrderDetailsController@update')->name('order.details..update');
        Route::get('destroy/{id}', 'OrderDetailsController@destroy')->name('order.details..destroy');
    });
});
