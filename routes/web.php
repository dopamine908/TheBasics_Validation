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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| 對request做validate驗證
|--------------------------------------------------------------------------
*/
Route::get('在controller做validation', 'ValidationController@validateInController');
Route::get('對傳遞的變數為array時做validate', 'ValidationController@validateArrayInController');


