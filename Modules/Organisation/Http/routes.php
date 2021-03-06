<?php

Route::group(['middleware' => 'web', 'prefix' => 'organisation', 'namespace' => 'Modules\Organisation\Http\Controllers'], function () {
  Route::resource('/', 'OrganisationController', [
      'names' => [
        'index' => 'organisation',
        'store' => 'organisation.store',
        'create' => 'organisation.create',
        'show' => 'organisation.show',
        'destroy' => 'organisation.destroy',
        'update' => 'organisation.update',
        'edit' => 'organisation.edit',
      ],
    ]
  )->parameter('', 'id');

  Route::post('/license/generate', 'OrganisationController@generateLicenses')->name('licenses.generate');

  Route::post('/activate', 'OrganisationController@activate')->name('organisation.activate');

  Route::post('/group/create', 'GroupController@store')->name('group.store');
});
