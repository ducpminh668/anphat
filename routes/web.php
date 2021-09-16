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

    Route::get('/imports/index', 'ImportController@index')->middleware(['role:administrator']);
    Route::get('/imports/create', 'ImportController@create')->middleware(['role:administrator']);
    Route::post('/imports', 'ImportController@store')->middleware(['role:administrator']);

    Route::resource('products', 'ProductController')->middleware(['role:administrator']);
    Route::resource('customers', 'CustomerController')->middleware(['role:administrator']);

    Route::get('/product-list', 'ClientController@listProduct')->middleware(['role:customer']);

    Route::get('products/{id}/price-set', 'ProductController@priceSet')->middleware(['role:administrator']);
    Route::post('products/{id}/price-set', 'ProductController@postPrice')->middleware(['role:administrator']);

    Route::post('/submitCart', 'ClientController@submitCart')->middleware(['role:customer']);
    Route::get('/cart', 'ClientController@showCart')->middleware(['role:customer']);
    Route::get('/orderSuccess', 'ClientController@orderSuccess');

    Route::resource('orders', 'OrderController');
    Route::get('/orders/{id}/success', 'OrderController@success')->middleware(['role:administrator']);
    Route::get('/orders/{id}/cancel', 'OrderController@cancel')->middleware(['role:administrator']);
    Route::get('/invoice/{id}', 'OrderController@invoice');

    Route::get('/quantityReport', 'ReportController@quantityReport')->middleware(['role:administrator']);
    Route::get('/revenueReport', 'ReportController@revenueReport')->middleware(['role:administrator']);

    Route::get('/getProductByCustomer', 'ClientController@getProductByCustomer');
    Route::get('/orderReturn/{id}', 'OrderController@orderReturn');

    Route::resource('users', 'UserController');

    Route::get('change-pass', 'UserController@changePass');
    Route::post('post-change-pass', 'UserController@postChangePass');
});
