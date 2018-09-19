<?php

Route::group(['middleware' => 'web', 'prefix' => 'course', 'namespace' => 'Modules\Course\Http\Controllers'], function()
{
    Route::resource('/', 'CourseController');
    Route::resource('/{name}/lesson/', 'LessonController');
    Route::resource('/{name}/exercise/', 'ExerciseController');
});
