<?php

Route::group(['middleware' => 'web', 'prefix' => 'forum', 'namespace' => 'Modules\Forum\Http\Controllers'], function () {
  Route::get('/', 'ForumController@index')->name('ForumIndex');

  Route::group(['prefix'=>'topic'], function(){
    Route::get('/{topic}/view', 'QuestionController@index')->name('QuestionIndex');
  });
});
