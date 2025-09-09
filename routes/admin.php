<?php


Route::get('/', function () {
    return view('admin.content.dashboard');
})->name('dashboard');

Route::get('news', 'Admin\\NewsController@index')->name('news');
Route::post('news/insert', 'Admin\\NewsController@store')->name('newsInsert');

Route::get('cabang', 'Admin\\CabangController@cabang')->name('cabang');
Route::post('cabang', 'Admin\\CabangController@cabangPost')->name('cabangPost');
Route::post('/hapus/{id}', 'Admin\\CabangController@hapus')->name('hapus');
