<?php

Route::group([
    'prefix' => 'admin/users',
    'as' => 'admin.users.',
    'namespace' => 'CodePress\CodeUser\Controllers',
    'middleware' => ['web']
        ], function() {

    Route::get('/', ['uses' => 'UsersAdminController@index', 'as' => 'index']);
    Route::get('/create', ['uses' => 'UsersAdminController@create', 'as' => 'create']);
    Route::post('/store', ['uses' => 'UsersAdminController@store', 'as' => 'store']);
    Route::get('{id}/edit', ['uses' => 'UsersAdminController@edit', 'as' => 'edit']);
    Route::put('{id}/update', ['uses' => 'UsersAdminController@update', 'as' => 'update']);
    Route::get('{id}/show', ['uses' => 'UsersAdminController@show', 'as' => 'show']);
    Route::get('{id}/delete', ['uses' => 'UsersAdminController@delete', 'as' => 'delete']);
    Route::delete('{id}/delete', ['uses' => 'UsersAdminController@destroy', 'as' => 'delete']);
});