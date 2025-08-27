<?php


Route::get('/', function () {
    return view('admin.content.dashboard');
})->name('dashboard');
