<?php

require_once(app_path('helpers.php'));

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('projects', 'ProjectsController');
Route::post('projects/{id}/upload', ['as' => 'projects.upload', 'uses' => 'ProjectsController@upload']);

Route::get('uploads', ['as' => 'uploads.index', 'uses' => 'UploadsController@index']);
