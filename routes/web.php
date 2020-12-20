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
Route::get('/home', function () {
    return view('home');
});


Auth::routes();
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/manager', 'ManagerController@index')->name('manager')->middleware('manager');
Route::get('/user', 'UserController@index')->name('user')->middleware('user');

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('home', 'HomeController@index')->name('home');

Route::get('/car', 'CarController@create')->name('car');
Route::get('/index', 'CarController@index')->name('index');
// Route::get('/index', 'CarController@index')->name('index');
Route::resource('cars', 'CarController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('password/email', 'ForgotPasswordController@forgot');
Route::view('forgot_password', 'auth.reset_password')->name('password.reset');
Route::post('password/reset', 'ForgotPasswordController@reset');
