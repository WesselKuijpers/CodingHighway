<?php

Route::group(['middleware' => 'web', 'prefix' => 'forum', 'namespace' => 'Modules\Forum\Http\Controllers'], function () {
  Route::get('/', 'ForumController@index')->name('ForumIndex');

  Route::group(['prefix'=>'topic'], function(){
    Route::get('/create', 'TopicController@create')->name('TopicCreate');
    Route::post('/create', 'TopicController@save')->name('TopicSave');

    Route::group(['prefix' => '{topic}'], function(){
      Route::get('/view', 'TopicController@index')->name('TopicIndex');

      Route::group(['prefix'=> 'question'], function(){
        Route::get('/{question}/view', 'QuestionController@show')->name('QuestionShow');
        Route::get('/create', 'QuestionController@create')->name('QuestionCreate');
        Route::post('/create', 'QuestionController@save')->name('QuestionSave');

        Route::post('/{question}/solve', 'QuestionController@solve')->name('QuestionSolve');

        Route::group(['prefix'=> 'answer'], function(){
          Route::post('best', 'AnswerController@best')->name('BestAnswer');
          Route::post('save', 'AnswerController@save')->name('AnswerSave');
        });
      });
    });
  });
});
