<?php

Route::group(['middleware' => 'web', 'prefix' => 'management', 'namespace' => 'Modules\Management\Http\Controllers'], function()
{
    Route::resource('/admin', 'AdminController',[
      'names' => [
        'index' => 'admin',
        'store' => 'admin.store',
        'create' => 'admin.create',
        'destroy' => 'admin.destroy',
        'update' => 'admin.update',
        'edit' => 'admin.edit'
      ]
    ])->only(['index','store'])->parameter('', 'id');
    
    Route::resource('/role', 'RoleController',[
      'names' => [
        'index' => 'role',
        'store' => 'role.store',
        'create' => 'role.create',
        'destroy' => 'role.destroy',
        'update' => 'role.update',
        'edit' => 'role.edit',
      ]
    ]);
});
