<?php
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabelController;
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

Route::view('/', 'welcome');

Route::post(
    '/invoice', 
    [InvoiceController::class, 'invoiceRequest']
)->name('invoice');

Route::get(

    //used to test
    '/invoice1', 
    [InvoiceController::class, 'invoiceRequest']
)->name('invoice1');

Route::view(/*used to test*/  '/labels1', 'labels')->name('labels1');

Route::post(

    //used to test
    '/label_show', 
    [LabelController::class, 'labelShow']
)->name('labelShow');