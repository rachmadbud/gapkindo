<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'GuestController@index')->name('guest.index');
// Route::get('/', function () {
//   return view('guest.layouts.master');
// })->name('guest.index');

Route::get('/comming-soon', function () {
  return view('guest.comming-soon');
})->name('soon');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail-news/{id}', 'GuestController@detailNews')->name('detail.news');
