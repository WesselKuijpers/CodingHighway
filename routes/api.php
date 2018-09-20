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
  Route::group(['prefix' => 'course'], function (){
    Route::post('/', 'api\CourseController@create')->name('ApiCourseCreate');
    Route::put('/', 'api\CourseController@edit')->name('ApiCourseEdit');
    Route::delete('/', 'api\CourseController@delete')->name('ApiCourseDelete');
  });
  
  Route::group(['prefix' => 'lesson'], function (){
    Route::post('/', 'api\LessonController@create')->name('ApiLessonCreate');
    Route::put('/', 'api\LessonController@edit')->name('ApiLessonEdit');
    Route::delete('/', 'api\LessonController@delete')->name('ApiLessonDelete');
  });

  Route::post('/superadmin', 'api\SuperAdminController@create')->name('ApiSuperAdmin');
});
