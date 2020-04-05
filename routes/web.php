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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/report-by-date','ReportController@reportbydate')->name('report-date');
Route::post('/report-by-date','ReportController@reportbydate')->name('report-filter-date');

Route::get('/report-by-type','ReportController@reportbytype')->name('report-type');
Route::post('/report-by-type','ReportController@reportbytype')->name('report-filter-type');

Route::resources([
    'guest' => 'GuestController'
]);
