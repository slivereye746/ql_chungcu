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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'ApartmentController@index'])->middleware(['auth']);

Route::get('/reports', function () {
    return view('reports');
})->middleware(['auth'])->name('reports');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

// Apartment routing
Route::get('apartment/{id}', ['as'=>'apartment', 'uses'=>'ApartmentController@getApartment'])->middleware(['auth']);

Route::get('apartment/edit/{id}', ['as'=>'apartment/edit', 'uses'=>'ApartmentController@edit'])->middleware(['auth']);

Route::PATCH('apartment/update/{id}', ['as'=>'apartment/update', 'uses'=>'ApartmentController@update'])->middleware(['auth']);

// Customer routing
Route::get('/customers', ['as'=>'customers', 'uses'=>'CustomerController@index'])->middleware(['auth']);
Route::get('customer/add', ['as'=>'customer_add', 'uses'=>'CustomerController@add'])->middleware(['auth']);
Route::post('addconfirm', ['as'=>'customer_addconfirm', 'uses'=>'CustomerController@addconfirm'])->middleware(['auth']);
Route::DELETE('/customer/delete', ['as'=>'customer_delete', 'uses'=>'CustomerController@delete'])->middleware(['auth']);

Route::get('customer/{id}', ['as'=>'customer', 'uses'=>'CustomerController@getCustomer'])->middleware(['auth']);
Route::get('customer/edit/{id}', ['as'=>'customer/edit', 'uses'=>'CustomerController@edit'])->middleware(['auth']);
Route::PATCH('customer/updates', ['as'=>'customer/update', 'uses'=>'CustomerController@update'])->middleware(['auth']);
Route::PATCH('removeapartment', ['as'=>'customer/removeapartment', 'uses'=>'CustomerController@removeApartment'])->middleware(['auth']);
Route::PATCH('modifyapartment', ['as'=>'customer/modifyapartment', 'uses'=>'CustomerController@modifyApartment'])->middleware(['auth']);

// User routing
Route::get('/users', ['as'=>'users', 'uses'=>'UserController@index'])->middleware(['auth']);
Route::get('user/{id}', ['as'=>'user', 'uses'=>'UserController@getUser'])->middleware(['auth']);
Route::get('user/edit/{id}', ['as'=>'user/edit', 'uses'=>'UserController@edit'])->middleware(['auth']);
Route::PATCH('user/updates', ['as'=>'user/update', 'uses'=>'UserController@update'])->middleware(['auth']);
Route::DELETE('/user/delete', ['as'=>'user_delete', 'uses'=>'UserController@delete'])->middleware(['auth']);

require __DIR__.'/auth.php';
