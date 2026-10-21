<?php


Route::get('/', function () {
    return view('admin.content.dashboard');
})->name('dashboard');

Route::get('news', 'Admin\\NewsController@index')->name('news');
Route::post('news/insert', 'Admin\\NewsController@store')->name('newsInsert');

Route::get('cabang', 'Admin\\CabangController@cabang')->name('cabang');
Route::post('cabang', 'Admin\\CabangController@cabangPost')->name('cabangPost');
Route::post('/hapus/news/{id}', 'Admin\\NewsController@destroy')->name('hapusNews');

Route::get('/galery', 'Admin\\GaleryController@index')->name('galery');
Route::post('/galery/{id}', 'Admin\\GaleryController@destroy')->name('destroy');
Route::post('/galery', 'Admin\\GaleryController@store')->name('galeryPost');
Route::get('/detail-galery/{id}', 'Admin\\GaleryController@detail')->name('detailGelery');
Route::post('/detail-galery/{id}', 'Admin\\GaleryController@detailGeleryInsert')->name('detailGeleryInsert');
// destroy galery detail
Route::get('/destroyDetail/{id}', 'Admin\\GaleryController@destroyDetail')->name('destroyDetail');

Route::get('publikasi', 'Admin\\PublikasiController@index')->name('publikasi');
Route::post('publikasi/insert', 'Admin\\PublikasiController@store')->name('publikasiInsert');
Route::post('destroyPublikasi/{id}', 'Admin\\PublikasiController@destroy')->name('destroyPublikasi');

Route::get('export-destinations', 'Admin\\ExportDestinationController@index')->name('exportDestinations');
Route::post('export-destinations/upload', 'Admin\\ExportDestinationController@upload')->name('exportDestinations.upload');
Route::get('export-destinations/template', 'Admin\\ExportDestinationController@downloadTemplate')->name('exportDestinations.template');

Route::get('indonesia-production', 'Admin\\IndonesiaProductionController@index')->name('indonesiaProduction');
Route::post('indonesia-production/upload', 'Admin\\IndonesiaProductionController@upload')->name('indonesiaProduction.upload');
Route::get('indonesia-production/template', 'Admin\\IndonesiaProductionController@downloadTemplate')->name('indonesiaProduction.template');

Route::get('global-production', 'Admin\\GlobalProductionController@index')->name('globalProduction');
Route::post('global-production/upload', 'Admin\\GlobalProductionController@upload')->name('globalProduction.upload');
Route::get('global-production/template', 'Admin\\GlobalProductionController@downloadTemplate')->name('globalProduction.template');
