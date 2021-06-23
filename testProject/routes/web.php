<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth.login');
});
    Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/updateInvoice/{id}', 'InvoiceController@show');
    Route::resource('/invoices', 'InvoiceController');
    Route::get('/section/{id}', 'InvoiceController@getProduct');
    
    Route::resource('/sections','SectionsController');
    Route::get('/InvoiceDetails/{id}', 'InvoiceController@edit');
    Route::get('/InvoiceFile/{invoice_number}/{file_path}', 'InvoiceController@open_file');
    Route::get('/InvoiceFileDownload/{invoice_number}/{file_path}', 'InvoiceController@download');
    Route::post('/InvoiceAddFile', 'InvoiceAttachmentController@store')->name('store_file');
    Route::post('/InvoiceFileDelete', 'InvoiceAttachmentController@destroy')->name('delete_file');
    Route::resource('/product', 'ProductsController');
    
});
Route::get('/{page}', 'AdminController@index');
// get stream to login 