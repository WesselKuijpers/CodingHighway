<?php

Route::group(['middleware' => 'web', 'prefix' => 'blipd', 'namespace' => 'Modules\Blipd\Http\Controllers'], function()
{
    Route::get('/', 'BlipdController@index');
});
