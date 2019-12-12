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
// travelia routes starts
Route::get('/travelia','traveliaController@index');
// travelia routes ends


//login routes starts
Route::post('/login','loginController@index');// /post route
//login routes ends

//logout routes starts
Route::get('/logout','logoutController@index');// /post route
//llogoutroutes ends

//admin routes starts
Route::get('/admin','adminController@index')->name('admin.index');
Route::get('/admin/adminProfile','adminController@adminProfile');
Route::post('/admin/adminProfile','adminController@adminProfilePost');
Route::get('/admin/adminCustInfo','adminController@adminCustInfo');
Route::post('/admin/adminCustInfo','adminController@adminCustInfoPost');
Route::get('/admin/adminAddVehicle','adminController@adminAddVehicle');
Route::post('/admin/adminAddVehicle','adminController@adminAddVehiclePost');
Route::get('/admin/adminRentHistory','adminController@adminRentHistory');
Route::post('/admin/adminRentHistory','adminController@adminRentHistoryPost');
Route::get('/admin/adminBlog','adminController@adminBlog');
Route::post('/admin/adminBlog','adminController@adminBlogPost');
//admin routes ends

//customer routes starts
Route::get('/customer','customerController@index')->name('customer.index');
Route::get('/customer/customerProfile','customerController@customerProfile');
Route::post('/customer/customerProfile','customerController@customerProfilePost');
Route::get('/customer/customerPrivateCar','customerController@customerPrivateCar');
Route::post('/customer/customerPrivateCar','customerController@customerPrivateCarPost');
Route::get('/customer/customerMicro','customerController@customerMicro');
Route::post('/customer/customerMicro','customerController@customerMicroPost');
Route::get('/customer/customerPickup','customerController@customerPickup');
Route::post('/customer/customerPickup','customerController@customerPickupPost');
Route::get('/customer/customerSelectCar','customerController@customerSelectCar');
Route::post('/customer/customerSelectCar','customerController@customerSelectCarPost');

Route::get('/customer/customerRent','customerController@customerRent');
Route::post('/customer/customerRent','customerController@customerRentPost');

Route::get('/customer/customerRentHistory','customerController@customerRentHistory');

Route::get('/customer/customerAddBlog','customerController@customerAddBlog');
Route::post('/customer/customerAddBlog','customerController@customerAddBlogPost');

Route::get('/customer/customerBlog','customerController@customerBlog');
Route::get('/customer/customerBlog/{v}','customerController@customerBlogDelete');
//customer routes ends
