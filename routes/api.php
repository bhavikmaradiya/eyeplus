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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('check-login', 'Controller@checkLogin')->name('check_login');

Route::get('/get-customers', 'CustomerController@index')->name('get-customers');
Route::post('/add-customers', 'CustomerController@store')->name('add-customers');
Route::get('/edit-customers/{id}', 'CustomerController@edit')->name('edit-customers');
Route::post('/update-customers/{id}', 'CustomerController@update')->name('update-customers');

Route::get('/get-products', 'ProductController@index')->name('get-products');

Route::get('/get-prescribers', 'PrescriberController@index')->name('get-prescribers');

Route::get('/get-invoice', 'InvoiceController@index')->name('get-invoice');
Route::get('/create-invoice', 'InvoiceController@create')->name('create-invoice');