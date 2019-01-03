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

Route::group(['middleware'=>'auth:api'], function() {
  Route::post('/progress', 'api\ProgressController@load')->name('ApiProgress');
  Route::post('/role/user', 'api\RoleUserManagementController@change')->name('ApiRoleUserManagement');
  Route::post('/result', 'api\StartExamController@result')->name('ApiResult');
  Route::post('/blipd/lesson', 'api\BlipdController@lessonUpdate')->name('ApiBlipdLesson');
  Route::post('/blipd/exercise', 'api\BlipdController@ExerciseUpdate')->name('ApiBlipdExercise');
  Route::post('/blipd/planning', 'api\BlipdController@GetPlanning')->name('ApiBlipdGetPlanning');
  Route::post('/blipd/pie', 'api\BlipdController@GetPie')->name('ApiBlipdGetPie');
  Route::post('/blipd/bar', 'api\BlipdController@GetBar')->name('ApiBlipdGetBar');
});

Route::post('/startexam', 'api\StartExamController@load')->name('ApiStartExam');

