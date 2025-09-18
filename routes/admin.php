<?php


Route::get('/', function () {
    return view('admin.content.dashboard');
})->name('dashboard');

Route::get('news', 'Admin\\NewsController@index')->name('news');
Route::post('news/insert', 'Admin\\NewsController@store')->name('newsInsert');

Route::get('cabang', 'Admin\\CabangController@cabang')->name('cabang');
Route::post('cabang', 'Admin\\CabangController@cabangPost')->name('cabangPost');
Route::post('/hapus/{id}', 'Admin\\CabangController@hapus')->name('hapus');

Route::get('/galery', 'Admin\\GaleryController@index')->name('galery');
Route::post('/galery/{id}', 'Admin\\GaleryController@destroy')->name('destroy');
Route::post('/galery', 'Admin\\GaleryController@store')->name('galeryPost');
Route::get('/detail-galery/{id}', 'Admin\\GaleryController@detail')->name('detailGelery');
Route::post('/detail-galery/{id}', 'Admin\\GaleryController@detailGeleryInsert')->name('detailGeleryInsert');
// destroy galery detail
Route::get('/destroyDetail/{id}', 'Admin\\GaleryController@destroyDetail')->name('destroyDetail');
