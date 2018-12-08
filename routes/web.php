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

/*
|--------------------------------------------------------------------------
| 自訂錯誤訊息or修改預設訊息
|--------------------------------------------------------------------------
在語系檔中指定自訂訊息
在語系檔中指定自訂屬性
*/
Route::get('自訂錯誤訊息or修改預設訊息', function () {
    return view('costumizeErrorMessage');
});
Route::post('自訂錯誤訊息or修改預設訊息', 'ValidationController@costumizeErrorMessage');

/*
|--------------------------------------------------------------------------
| 依條件增加驗證的規則
|--------------------------------------------------------------------------
*/
Route::get('依條件增加規則', function () {
    return view('ConditionallyAddingRules');
});
Route::post('依條件增加規則', 'ValidationController@addingRulesConditionally');

/*
|--------------------------------------------------------------------------
| 可以對驗證增加複雜的驗證規則（不只是格式類的）
|--------------------------------------------------------------------------
*/
Route::get('較為複雜的驗證規則',function () {
    return view('ComplexValidatorRule');
});
Route::post('較為複雜的驗證規則', 'ValidationController@complexValidatorRule');

/*
|--------------------------------------------------------------------------
| 自己寫特殊驗證規則
|--------------------------------------------------------------------------
php artisan make:rule
*/
Route::get('自己寫rule', function () {
    return view('makeRule');
});
Route::post('自己寫rule', 'ValidationController@makeRule');


