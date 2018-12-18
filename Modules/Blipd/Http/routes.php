<?php

Route::group(['middleware' => 'web', 'prefix' => 'blipd', 'namespace' => 'Modules\Blipd\Http\Controllers'], function()
{
    Route::get('/', 'BoardController@index')->name('blipd');

    Route::resource('/planning', 'PlanningController', [
        'names' => [
          'store' => 'planning.store',
          'create' => 'planning.create',
        ]
      ])->parameter('', 'id')->only(['create', 'store']);
});
