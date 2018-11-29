<?php

Route::group(['middleware' => 'web', 'prefix' => 'review', 'namespace' => 'Modules\Review\Http\Controllers'], function()
{
    Route::group(['prefix' => 'teacher'], function(){
        Route::get('/', 'TeacherCheckController@index')->name('teacherCheckIndex');
        Route::get('/solution/{id}', 'TeacherCheckController@show')->name('teacherCheckShow');
        Route::post('/solution/{id}', 'TeacherCheckController@store')->name('teacherCheckStore');
    });
});
