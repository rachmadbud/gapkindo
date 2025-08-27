<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'GuestController@index')->name('guest.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
