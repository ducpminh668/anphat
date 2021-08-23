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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/imports/index', 'ImportController@index');
    Route::get('/imports/create', 'ImportController@create');
    Route::post('/imports', 'ImportController@store');

    Route::resource('products', 'ProductController');
    Route::resource('customers', 'CustomerController');

    Route::get('/product-list', 'ClientController@listProduct');

    Route::get('products/{id}/price-set', 'ProductController@priceSet');
    Route::post('products/{id}/price-set', 'ProductController@postPrice');

    Route::post('/submitCart', 'ClientController@submitCart');
    Route::get('/cart', 'ClientController@showCart');
});
