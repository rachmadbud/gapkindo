<?php


Route::get('/', function () {
    return view('admin.content.dashboard');
})->name('dashboard');

Route::get('news', 'Admin\\NewsController@index')->name('news');
Route::post('news/insert', 'Admin\\NewsController@store')->name('newsInsert');
