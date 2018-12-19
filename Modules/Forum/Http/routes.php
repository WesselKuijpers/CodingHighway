<?php

Route::group(['middleware' => 'web', 'prefix' => 'forum', 'namespace' => 'Modules\Forum\Http\Controllers'], function () {
  Route::get('/', 'ForumController@index')->name('ForumIndex');

  Route::group(['prefix'=>'topic'], function(){
    Route::get('/create', 'TopicController@create')->name('TopicCreate');
    Route::post('/create', 'TopicController@save')->name('TopicSave');
    Route::get('/{topic}/view', 'TopicController@index')->name('TopicIndex');
    Route::get('/{topic}/{question}/view', 'QuestionController@index')->name('QuestionShow');
  });
});
