<?php

use App\User;
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

Auth::routes();

Route::get('/welcome', 'AppController@new')->name('welcome');
Route::post('/verify', 'AppController@verify')->name('verify');
Route::middleware("check")->group(function () {

    Route::get('/', 'AppController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/add-product', 'HomeController@addproduct')->name('addproduct');
    Route::get('/edit-product/{id}', 'HomeController@editproduct')->name('editproduct');
    Route::post('/save-product/{id}', 'HomeController@updateproduct')->name('updateproduct');
    Route::post('/delete-product/{id}', 'HomeController@deleteproduct')->name('deleteproduct');
    Route::get('/all-users', 'HomeController@allusers')->name('allusers');
    Route::post('/add-user', 'HomeController@adduser')->name('adduser');
    Route::get('/edit-user/{id}', 'HomeController@edituser')->name('edituser');
    Route::post('/save-user/{id}', 'HomeController@updateuser')->name('updateuser');
    Route::post('/delete-user/{id}', 'HomeController@deleteuser')->name('deleteuser');

    Route::get('/sales-summary', 'HomeController@salesummary')->name('salesummary');
    Route::get('/filter-sales-summary', 'HomeController@filtersalesummary')->name('filtersalesummary');
    Route::get('/delete-sales-summary-item/{id}', 'HomeController@deletesalesummaryitem')->name('deletesalesummaryitem');
    Route::get('/delete-all-sales-summary', 'HomeController@deleteallsalesummary')->name('deleteallsalesummary');
    Route::get('/print-sale/{sale}', 'HomeController@printsale')->name('printsale');


    Route::get('/cashierpage', 'HomeController@cashierpage')->name('cashierpage');
    Route::post('/add-item', 'HomeController@additem')->name('additem');
    Route::get('/edit-item/{id}', 'HomeController@edititem')->name('edititem');
    Route::post('/save-item/{id}', 'HomeController@updateitem')->name('updateitem');
    Route::post('/delete-item/{id}', 'HomeController@deleteitem')->name('deleteitem');

    Route::get('/products', 'HomeController@products')->name('products');

    Route::get('/save-sale-details', 'HomeController@savesaledetails')->name('savesaledetails');

    Route::post('/change-password', 'HomeController@changepassword')->name('changepassword');

    Route::get('/about', 'AppController@about')->name('about');
    Route::get('/license-and-agreement', 'AppController@agree')->name('agreement');


    Route::get('/admin-cashier', 'HomeController@admincashier')->name('admincashier');

    Route::get('/cashier-sales', 'HomeController@cashiersales')->name('cashiersales');
    Route::post('/printer-settings', 'PrinterConfigController@setting')->name('printer.setting');

});
