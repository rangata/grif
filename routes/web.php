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


Route::resource('customers', 'CustomersController');

Route::resource('goods', 'GoodsController');
Route::resource('contracts', 'ContractsController');
Route::resource('dashboard', 'Dashboard');

Route::resource('companies', 'CompaniesController');

Route::get('sd', function () {

    $contracts = \App\Contract::getMissingDocuments(7)->get();
    return $contracts;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('notes', 'NotesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
