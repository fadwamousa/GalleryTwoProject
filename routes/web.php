<?php


Route::get('/', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::post('/albums', 'AlbumsController@store');

Route::get('/photos/create/{id}','PhotosController@create');
Route::get('/photos/{id}','PhotosController@show');
Route::post('/photos','PhotosController@store');
Route::delete('/photos/{id}','PhotosController@destroy');
