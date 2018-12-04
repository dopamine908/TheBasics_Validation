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


/*
|--------------------------------------------------------------------------
| 自定義request 撰寫客製化的validation規則
|--------------------------------------------------------------------------
*/
Route::get('訂製的request', function() {
    return view('CustumizeRequestForm');
});
Route::post('訂製的request', 'ValidationController@costumizeRequest');

/*
|--------------------------------------------------------------------------
| 在controller內建置validate規則及驗證失敗的處理
|--------------------------------------------------------------------------
*/
Route::get('寫validate在controller內', function () {
    return view('MakeValidateInController');
});
Route::post('寫validate在controller內', 'ValidationController@makeValidateInController');


