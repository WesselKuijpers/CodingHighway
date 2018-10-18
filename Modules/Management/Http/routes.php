<?php

Route::group(['middleware' => 'web', 'prefix' => 'management', 'namespace' => 'Modules\Management\Http\Controllers'], function()
{
    Route::resource('/admin', 'AdminController')->only(['index','store'])->parameter('', 'id');
});
