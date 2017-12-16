<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
  Route::get('/products', 'ProductController@getIndex')->name('products');
  Route::get('/orderproducts', 'CartController@getAllProducts')->name('cartproducts');


























/*Route::get('product-add', function () {
    $product = new \App\Entities\Product([
      'name' => 'Makecar2',
      'description' => 'car description.']);

    \EntityManager::persist($product);
    \EntityManager::flush();

    return 'added!';
});*/
