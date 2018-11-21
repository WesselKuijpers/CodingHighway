<?php

Route::group(['middleware' => 'web', 'prefix' => 'management', 'namespace' => 'Modules\Management\Http\Controllers'], function () {
    Route::resource('/role', 'RoleController', [
    'names' => [
      'index' => 'role',
      'store' => 'role.store',
      'create' => 'role.create',
      'destroy' => 'role.destroy',
      'update' => 'role.update',
      'edit' => 'role.edit',
    ]
  ]);

  Route::group(['prefix' => '/user/role'], function () {
    Route::get('/', 'RoleUserController@index')->name('RoleUser');
  });

  Route::group(['prefix' => '/modules'], function () {
    Route::get('/', 'ModuleController@index')->name('Module');
    Route::get('/zetaan/{module}', 'ModuleController@zetaan')->name('ModuleAan');
    Route::get('/zetuit/{module}', 'ModuleController@zetuit')->name('ModuleUit');
  });
});
