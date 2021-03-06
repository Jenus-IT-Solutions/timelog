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
    return view('timelog.form');
});

Route::get('real-time', function() {
    return [
        'date' => \Carbon\Carbon::now()->format('M d, Y'),
        'time' => \Carbon\Carbon::now()->format('H:i:s'),
    ];
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('employees', 'Employees\EmployeesController');
Route::post('employees/check', 'Employees\EmployeesController@check')->name('employees.check');

Route::post('timelog/login', 'TimeLog\TimelogController@login')->name('timelog.login');
Route::post('timelog/logoff', 'TimeLog\TimeLogController@logoff')->name('timelog.logoff');

Route::get('/calculator', function() {
    return view('calculator.calculator');
});