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

Route::get('/dashboard', function () {
    return view('layouts.admin.app');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'admin'], function () {
      Route::resource('/users', 'UserController');
      Route::resource('/companies', 'CompanyController');
      Route::resource('/activities', 'ActivityController');
      Route::get('/activities/{id}/events', 'ActivityController@adminEvents');
      Route::resource('/events', 'EventController');
      Route::resource('/aplications', 'AplicationController');
      Route::get('/users/{id}/assing_event','UserController@assingEvent');
    });

    Route::group(['middleware' => 'company'], function () {

    });

    Route::group(['middleware' => 'normal_user'], function () {

    });

});
