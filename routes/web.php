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
    return view('layout.index');
});

Route::get('/master/department', 'DepartmentController@index')->name('department.index');
Route::post('/master/department/store', 'DepartmentController@store')->name('department.store');
Route::put('/master/department/update/{id}', 'DepartmentController@update')->name('department.update');
Route::delete('/master/department/delete/{id}', 'DepartmentController@destroy')->name('department.destroy');

Route::get('/master/position', 'PositionController@index')->name('position.index');
Route::post('/master/position/store', 'PositionController@store')->name('position.store');
Route::put('/master/position/update/{id}', 'PositionController@update')->name('position.update');
Route::delete('/master/position/delete/{id}', 'PositionController@destroy')->name('position.destroy');

Route::get('/master/employee', 'EmployeeController@index')->name('employee.index');
Route::post('/master/employee/store', 'EmployeeController@store')->name('employee.store');
Route::put('/master/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
Route::delete('/master/employee/delete/{id}', 'EmployeeController@destroy')->name('employee.destroy');