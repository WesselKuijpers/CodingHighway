<?php

Route::group(['middleware' => 'web', 'prefix' => 'course', 'namespace' => 'Modules\Course\Http\Controllers'], function()
{

    Route::resource('/level', 'LevelController', [
      'names' => [
        'index' => 'level',
        'store' => 'level.store',
        'create' => 'level.create',
        'destroy' => 'level.destroy',
        'update' => 'level.update',
        'edit' => 'level.edit'
      ]
    ])->except('show')->parameter('', 'id');

    Route::resource('/', 'CourseController', [
      'names' => [
        'index' => 'course',
        'store' => 'course.store',
        'create' => 'course.create',
        'show' => 'course.show',
        'destroy' => 'course.destroy',
        'update' => 'course.update',
        'edit' => 'course.edit'
      ]
    ])->parameter('', 'id');

    Route::resource('/{course_id}/lesson/', 'LessonController', [
      'names' => [
        'index' => 'lesson',
        'store' => 'lesson.store',
        'create' => 'lesson.create',
        'show' => 'lesson.show',
        'destroy' => 'lesson.destroy',
        'update' => 'lesson.update',
        'edit' => 'lesson.edit'
      ]
    ])->parameter('', 'id');

    Route::resource('/{course_id}/exercise/', 'ExerciseController', [
      'names' => [
        'index' => 'exercise',
        'store' => 'exercise.store',
        'create' => 'exercise.create',
        'show' => 'exercise.show',
        'destroy' => 'exercise.destroy',
        'update' => 'exercise.update',
        'edit' => 'exercise.edit'
      ]
    ])->parameter('', 'id');

    Route::resource('/{course_id}/startexam/', 'StartExamController', [
      'names' => [
        'index' => 'startExam',
        'store' => 'startExam.store',
        'create' => 'startExam.create',
        'show' => 'startExam.show',
        'destroy' => 'startExam.destroy',
        'update' => 'startExam.update',
        'edit' => 'startExam.edit'
      ]
    ])->parameter('', 'id');

    Route::post('/progress', 'ProgressController@Create')->name('progress.create');

    Route::post('/progress/reset', 'ProgressController@reset')->name('progress.reset');

    Route::post('/solution/create', 'SolutionController@store')->name('solution.create');
    Route::put('/solution/update/{id}', 'SolutionController@update')->name('solution.update');
    Route::delete('/solution/delete/{id}', 'SolutionController@destroy')->name('solution.delete');

});
