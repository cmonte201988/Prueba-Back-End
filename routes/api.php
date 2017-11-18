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

//-- Api V1
Route::group(['prefix' => 'v1'], function () {
    Route::get('/employee/get-search-by-salary', 'Api\V1\EmployeeController@getSearchBySalary')->name('api.v1.employee.index'); 
});
