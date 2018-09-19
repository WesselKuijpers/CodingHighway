<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>'auth:api'], function(){
  Route::post('/course/', 'api\CourseController@create');
  Route::put('/course/', 'api\CourseController@edit');
  Route::delete('/course/', 'api\CourseController@delete');
});
