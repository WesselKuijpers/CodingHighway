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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('LicenseCheck');

Route::get('/coursecolors', 'StyleController@CourseColors')->name('CourseColors');
Route::get('/calculatecolors', 'StyleController@CalculateTextColor')->name('CalculateColors');

Route::group(['prefix'=>'user'], function(){
  Route::get('/activate', 'LicenseActivationController@activate')->name('UserActivateLicense');
  Route::post('/activate', 'LicenseActivationController@save')->name('UserActivateLicenseSave');

  Route::get('/edit', 'UserController@edit')->name('UserEdit');
  Route::post('/edit', 'UserController@save')->name('UserEditSave');
});
