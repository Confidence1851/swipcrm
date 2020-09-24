<?php
use App\User;
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

Route::get('/', 'AppController@index')->middleware('check');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('check');

Route::post('/add-product', 'HomeController@addproduct')->name('addproduct')->middleware('check');
Route::get('/edit-product/{id}', 'HomeController@editproduct')->name('editproduct')->middleware('check');
Route::post('/save-product/{id}', 'HomeController@updateproduct')->name('updateproduct')->middleware('check');
Route::get('/delete-product/{id}', 'HomeController@deleteproduct')->name('deleteproduct')->middleware('check');
Route::get('/welcome', 'AppController@new')->name('welcome');
Route::post('/verify', 'AppController@verify')->name('verify');
Route::get('/all-users', 'HomeController@allusers')->name('allusers')->middleware('check');
Route::post('/add-user', 'HomeController@adduser')->name('adduser')->middleware('check');
Route::get('/edit-user/{id}', 'HomeController@edituser')->name('edituser')->middleware('check');
Route::post('/save-user/{id}', 'HomeController@updateuser')->name('updateuser')->middleware('check');
Route::get('/delete-user/{id}', 'HomeController@deleteuser')->name('deleteuser')->middleware('check');

Route::get('/sales-summary', 'HomeController@salesummary')->name('salesummary')->middleware('check');
Route::get('/filter-sales-summary', 'HomeController@filtersalesummary')->name('filtersalesummary')->middleware('check');
Route::get('/delete-sales-summary-item/{id}', 'HomeController@deletesalesummaryitem')->name('deletesalesummaryitem')->middleware('check');
Route::get('/delete-all-sales-summary', 'HomeController@deleteallsalesummary')->name('deleteallsalesummary')->middleware('check');


Route::get('/cashierpage', 'HomeController@cashierpage')->name('cashierpage')->middleware('check');
Route::post('/add-item', 'HomeController@additem')->name('additem')->middleware('check');
Route::get('/edit-item/{id}', 'HomeController@edititem')->name('edititem')->middleware('check');
Route::post('/save-item/{id}', 'HomeController@updateitem')->name('updateitem')->middleware('check');
Route::get('/delete-item/{id}', 'HomeController@deleteitem')->name('deleteitem')->middleware('check');

Route::get('/products', 'HomeController@products')->name('products')->middleware('check');

Route::get('/save-sale-details', 'HomeController@savesaledetails')->name('savesaledetails')->middleware('check');

Route::post('/change-password', 'HomeController@changepassword')->name('changepassword')->middleware('check');

Route::get('/about', 'AppController@about')->name('about')->middleware('check');
Route::get('/license-and-agreement', 'AppController@agree')->name('agreement')->middleware('check');


Route::get('/admin-cashier', 'HomeController@admincashier')->name('admincashier')->middleware('check');

Route::get('/cashier-sales', 'HomeController@cashiersales')->name('cashiersales')->middleware('check');

