<?php

Route::get('/', 'MainController@index');
Route::resource('book', 'BookController');
Route::resource('author', 'AuthorController');
Route::resource('publisher', 'PublisherController');

Route::dispatch();
