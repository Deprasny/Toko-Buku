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

//Route Buku
Route::prefix('buku')->group(function () {
    Route::get('/', 'BukuController@index')->name('index.buku');
    Route::get('/add', 'BukuController@create')->name('add.buku');
    Route::post('/store', 'BukuController@store')->name('store.buku');
    Route::get('/detail/{id}', 'BukuController@show')->name('detail.buku');
    Route::get('/edit/{id}', 'BukuController@edit')->name('edit.buku');
	Route::post('/update/{id}', 'BukuController@update')->name('update.buku');
	Route::get('/delete/{id}', 'BukuController@destroy')->name('delete.buku');
    Route::get('/q', 'BukuController@index')->name('q.buku');
});

//Route distributor
Route::prefix('distributor')->group(function () {
    Route::get('/', 'DistributorController@index')->name('index.distributor');
    Route::get('/add', 'DistributorController@create')->name('add.distributor');
    Route::post('/store', 'DistributorController@store')->name('store.distributor');
    Route::get('/edit/{id}', 'DistributorController@edit')->name('edit.distributor');
	Route::post('/update/{id}', 'DistributorController@update')->name('update.distributor');
	Route::get('/delete/{id}', 'DistributorController@destroy')->name('delete.distributor');
    Route::get('/q', 'DistributorController@index')->name('q.distributor');
});

//Route kasir
Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('index.user');
    Route::get('/detail/{id}', 'UserController@show')->name('detail.user');
    Route::get('/edit/{id}', 'UserController@edit')->name('edit.user');
    Route::post('/update/{id}', 'UserController@update')->name('update.user');
    Route::get('/delete/{id}', 'UserController@destroy')->name('delete.user');
    Route::get('/q', 'UserController@index')->name('q.user');
});

//Route Pasok
Route::prefix('pasok')->group(function () {
    Route::get('/', 'PasokController@index')->name('index.pasok');
    Route::get('/add', 'PasokController@create')->name('add.pasok');
    Route::post('/store', 'PasokController@store')->name('store.pasok');
    Route::get('/edit/{id}', 'PasokController@edit')->name('edit.pasok');
    Route::post('/update/{id}', 'PasokController@update')->name('update.pasok');
    Route::get('/delete/{id}', 'PasokController@destroy')->name('delete.pasok');
    Route::get('/q', 'PasokController@index')->name('q.pasok');
});

//Route Penjualan
Route::prefix('penjualan')->group(function () {
    Route::get('/', 'PenjualanController@index')->name('index.penjualan');
    Route::get('/add', 'PenjualanController@create')->name('add.penjualan');
    Route::post('/store', 'PenjualanController@store')->name('store.penjualan');
    Route::get('/edit/{id}', 'PenjualanController@edit')->name('edit.penjualan');
    Route::post('/update/{id}', 'PenjualanController@update')->name('update.penjualan');
    Route::get('/delete/{id}', 'PenjualanController@destroy')->name('delete.penjualan');
    Route::get('/q', 'PenjualanController@index')->name('q.penjualan');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
