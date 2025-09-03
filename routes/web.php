<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get('/', 'GuestController@index')->name('guest.index');

Route::get('/lang/{locale}', function (string $locale) {
  if (! in_array($locale, ['en', 'id'])) {
    abort(400);
  }

  App::setLocale($locale);
  return redirect('/')->withCookie(cookie()->forever('locale', $locale));
})->name('langSwitch');
// Route::get('/', function () {
//   return view('guest.layouts.master');
// })->name('guest.index');
Route::get('/migrate', function () {
  Artisan::call('migrate:fresh', ['--force' => true]);
  return 'Migration sudah dijalankan!';
});

Route::get('/seed-roles', function () {
  Artisan::call('db:seed', [
    '--class' => 'Database\\Seeders\\RolesTableSeeder',
    '--force' => true,
  ]);
  return 'RolesTableSeeder sudah dijalankan!';
});

Route::get('/seed-admin', function () {
  Artisan::call('db:seed', [
    '--class' => 'Database\\Seeders\\AdminUserSeeder',
    '--force' => true,
  ]);
  return 'AdminUserSeeder sudah dijalankan!';
});

Route::get('/seed-tpp', function () {
  Artisan::call('db:seed', [
    '--class' => 'Database\\Seeders\TppUserSeeder',
    '--force' => true,
  ]);
  return 'AdminUserSeeder sudah dijalankan!';
});

Route::get('/comming-soon', function () {
  return view('guest.comming-soon');
})->name('soon');

Route::get('/berita', 'GuestController@berita')->name('berita');


Route::get('/galeri', function () {
  return view('guest.comming-soon');
})->name('galeri');

Route::get('/kontak', function () {
  return view('guest.kontak');
})->name('kontak');

Route::get('/anggotaTpp', 'GuestController@anggotaTpp')->name('anggotaTpp');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail-news/{id}', 'GuestController@detailNews')->name('detail.news');
