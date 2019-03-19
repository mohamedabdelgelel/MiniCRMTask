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

Route::get('/home', 'HomeController@index')->name('home');

//Start Company
Route::get('displayCompanies'	,'CompanyController@index');
Route::get('createCompany'  	,'CompanyController@create');
Route::post('storeCompany'  	,'CompanyController@store');
Route::get('showCompany/{id}'  	,'CompanyController@show');
Route::get('editCompany/{id}'  	,'CompanyController@edit');
Route::post('updateCompany/{id}','CompanyController@update');
Route::get('destroyCompany/{id}','CompanyController@destroy');
//End Company

//Start Employee
Route::get('displayEmployees'	  ,'EmployeeController@index');
Route::get('createEmployee'		  ,'EmployeeController@create');
Route::post('storeEmployee'  	  ,'EmployeeController@store');
Route::get('showEmployee/{id}'    ,'EmployeeController@show');
Route::get('editEmployee/{id}'    ,'EmployeeController@edit');
Route::post('updateEmployee/{id}' ,'EmployeeController@update');
Route::get('destroyEmployee/{id}' ,'EmployeeController@destroy');
//Start Employee
Auth::routes();


