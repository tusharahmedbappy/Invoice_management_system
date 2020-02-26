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

use App\Http\Controllers\invoiceController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Routing\Route;

Route::get('/', 'invoiceController@invoice_ui');

Route::post('invoice-details','invoiceController@invoice_details');
Route::get('invoice-manage','invoiceController@invoice_manage');
Route::post('add-item','invoiceController@add_item');
Route::get('delete/{id}','invoiceController@delete_item');

Route::post('save-invoice','invoiceController@save_invoice');
Route::get('invoice-list','invoiceController@invoice_list');
