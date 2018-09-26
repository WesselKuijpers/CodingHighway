<?php

Route::group(['middleware' => 'web', 'prefix' => 'course', 'namespace' => 'Modules\Course\Http\Controllers'], function()
{

    Route::resource('/level', 'LevelController')->parameter('', 'id');
    Route::resource('/', 'CourseController')->parameter('', 'id');
    Route::resource('/{course_id}/lesson/', 'LessonController')->parameter('', 'id');
    Route::resource('/{course_id}/exercise/', 'ExerciseController')->parameter('', 'id');

});
