<?php

Route::group(['middleware' => 'web', 'prefix' => 'organisation', 'namespace' => 'Modules\Organisation\Http\Controllers'], function()
{
    Route::get('/', 'OrganisationController@index');
});
