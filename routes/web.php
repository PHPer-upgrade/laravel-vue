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


/*后台*/
Route::get('/backend', 'Auth\LoginController@index');
Route::post('/backend/login', 'Auth\LoginController@login');
Route::post('/backend/logout', 'Auth\LoginController@logout');
Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => 'auth.admin'], function () {
    
    Route::get('/index', 'IndexController@index');
    //管理员
    Route::resource('admins', 'AdminController');
    Route::post('admin/change-status/{id}', 'AdminController@changeStatus');
    //用户
    Route::resource('users', 'UserController');
    Route::post('user/change-field-value/{id}', 'UserController@changeFieldValue');
});
