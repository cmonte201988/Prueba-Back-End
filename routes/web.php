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

Route::get('/', 'EmployeeController@index')->name('employee.index'); 
Route::get('/form/{id?}', 'EmployeeController@form')->name('employee.form');
Route::post('/proccess', 'EmployeeController@proccess')->name('employee.proccess');