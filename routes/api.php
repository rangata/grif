<?php

use Illuminate\Http\Request;

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

Route::get('goods', 'API\GoodsController@index');
Route::get('goods/{id}', 'API\GoodsController@showCustomerGood');
Route::get('contracts/{id}/getContracts', 'API\ContractsController@getContracts');
Route::get('contracts', 'API\ContractsController@index');
Route::post('contracts', 'API\ContractsController@store');
Route::delete('contracts/{id}', 'API\ContractsController@destroy');
Route::resource('customers', 'API\CustomersController');
Route::resource('companies', 'API\CompaniesController');
Route::get('companies/{id}/getDetails', 'API\CompaniesController@getDetails');
