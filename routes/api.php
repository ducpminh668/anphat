<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('login', 'api\UserController@login');
Route::post('register', 'api\UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'api\UserController@details');
    Route::resource('products', 'api\ProductController');
    // Store product images
    Route::post('store_product_image', 'api\ProductController@storeImage');
    // Delete product images
    Route::delete('delete_product_image', 'api\ProductController@deleteImage');
    Route::resource('products', 'api\ProductController');
    Route::resource('orders', 'api\OrderController');
    Route::get('filter_orders', 'api\OrderController@filter');
    // Delete order details
    Route::delete('delete_order_detail', 'api\OrderController@deleteOrderDetail');
    Route::resource('customers', 'api\CustomerController');
    Route::resource('roles', 'api\RoleController');
    Route::resource('permissions', 'api\PermissionController');
});
