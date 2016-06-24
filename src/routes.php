<?php

Route::group([
    'prefix' => 'dashboard',
    'as' => 'admin.users.',
    'namespace' => 'Emiolo\\User\\Controllers\\RootAdmin',
    'middleware' => ['web', 'auth']
        ], function() {

    Route::get('/', ['uses' => 'UsersRootAdminController@index', 'as' => 'index']);
    Route::get('/user/create', ['uses' => 'UsersRootAdminController@create', 'as' => 'create']);
    Route::post('/user/store', ['uses' => 'UsersRootAdminController@store', 'as' => 'store']);
    Route::get('/user/{id}/edit', ['uses' => 'UsersRootAdminController@edit', 'as' => 'edit']);
    Route::update('/user/{id}', ['uses' => 'UsersRootAdminController@update', 'as' => 'update']);
    Route::get('/user/{id}/show', ['uses' => 'UsersRootAdminController@show', 'as' => 'show']);
    Route::get('/user/{id}/delete', ['uses' => 'UsersRootAdminController@delete', 'as' => 'delete']);
    Route::delete('/user/{id}', ['uses' => 'UsersRootAdminController@destroy', 'as' => 'delete']);
});