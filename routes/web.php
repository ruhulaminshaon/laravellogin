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
Route::post('/change-password','ChangepasswordController@index')->name('change-password'); //<!--changepassword controller-->

//Admin login form
//Route::group(['as'=>'auther.','prefix'=>'auther','namespace'=>'Auther','middleware'=>['auth','auther']],function(){ Route::get('dashboard','DashboardController@index')->name('dashboard'); });
Route::GET('admin/home','AdminController@index');
Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
//Route::POST('/logout','admin\LoginController@logout');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm ')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
//api
Route::get('/apikey','ApikeyController@index')->name('apikey');
Route::post('/apikey','ApikeyController@store')->name('api_save');
