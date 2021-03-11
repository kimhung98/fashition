<?php

use Illuminate\Routing\Router;

Route::group([
    'namespace'     => 'Core\Modules\Webview\Controllers',
    'middleware' => ['web'],
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('pages.index');

    $router->get('/shop', 'ShopController@index')->name('pages.shop');
    $router->get('/shop/{key}', 'ShopController@getProductByCategory')->name('pages.category');
    $router->get('/product/{id}', 'ShopController@getProductDetails')->name('pages.product');

    $router->get('shopping-cart', 'CartController@index')->name('pages.shopping-cart');
    $router->post('add-shopping-cart/{id}', 'CartController@create')->name('cart.add');
    $router->post('shopping-cart/update', 'CartController@update')->name('cart.update');
    $router->post('shopping-cart/remove/{id}', 'CartController@destroy')->name('cart.destroy');
    $router->get('checkout/{id}', 'CartController@checkout')->name('pages.checkout');
    $router->post('checkout', 'CartController@addCheckout')->name('checkout');

    $router->get('/login', 'LoginController@index')->name('pages.login');
    $router->post('/login', 'LoginController@login')->name('login');
});

