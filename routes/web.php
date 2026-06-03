<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;


Route::get('/', 'GuestController@index')->name('guest.index');
// Route::get('/', function () {
//   return view('perbaikan');
// });


Route::get('/change-language/{locale}', function ($locale) {
  if (!in_array($locale, ['en', 'id'])) {
    abort(400);
  }

  App::setLocale($locale);
  Cookie::queue('locale', $locale, 525600); // simpan 1 tahun
  return Redirect::back();
})->name('langSwitch');
// Route::get('/', function () {
//   return view('guest.layouts.master');
// })->name('guest.index');

// Route::get('/migrate', function () {
//   Artisan::call('migrate:fresh', [
//     '--seed' => true,   // tambahkan untuk jalankan seeder
//     '--force' => true,  // supaya bisa dijalankan di production
//   ]);

//   return 'Migration fresh + seed sudah dijalankan!';
// });
Route::get('/migrate', function () {
  abort_unless(app()->environment('local'), 403);

  Artisan::call('migrate', ['--force' => true]);
  return 'Migration sudah dijalankan!';
});


Route::get('/optimize-app', function () {
  Artisan::call('config:cache');
  Artisan::call('route:cache');
  Artisan::call('view:cache');

  return "✅ Artisan optimize commands executed successfully!";
});

// Route::get('/seed-roles', function () {
//   Artisan::call('db:seed', [
//     '--class' => 'Database\\Seeders\\RolesTableSeeder',
//     '--force' => true,
//   ]);
//   return 'RolesTableSeeder sudah dijalankan!';
// });

// Route::get('/seed-admin', function () {
//   Artisan::call('db:seed', [
//     '--class' => 'Database\\Seeders\\AdminUserSeeder',
//     '--force' => true,
//   ]);
//   return 'AdminUserSeeder sudah dijalankan!';
// });


Route::get('/comming-soon', function () {
  return view('guest.comming-soon');
})->name('soon');

Route::get('/berita', 'GuestController@berita')->name('berita');

Route::get('/kontak', function () {
  return view('guest.kontak2');
})->name('kontak');

Route::get('/anggota', 'AnggotaController@index')->name('anggota');

Route::get('/estate', 'AnggotaController@estate')->name('estate');
Route::get('/centrifuged', 'AnggotaController@centrifuged')->name('centrifuged');
Route::get('/rss-producers', 'AnggotaController@rssProducers')->name('rss-producers');
Route::get('/tsr-producers', 'AnggotaController@tsrProducers')->name('tsr-producers');
Route::get('/brownCrapeProducer', 'AnggotaController@brownCrapeProducer')->name('brown-crape-producer');
Route::get('/traders', 'AnggotaController@traders')->name('traders');

Route::get('/cabang', 'GuestController@cabang')->name('cabang');
Route::get('/cabang/{id}', 'GuestController@detailCabang')->name('detail-cabanag');

Route::get('/galeri', 'GuestController@galery')->name('galeri');
Route::get('/galeri/{id}', 'GuestController@detailGalery')->name('detailGaleri');

Route::get('/regulasi', 'GuestController@regulasi')->name('regulasi');

Route::get('/sejarah', function () {
  return view('guest.sejarah');
})->name('sejarah');

Route::get('/excel', function () {
  return view('guest.excel');
})->name('');

Route::get('/form-tantangan', function () {
  return view('guest.form-permasalahan');
})->name('formPermasalahan');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail-news/{id}', 'GuestController@detailNews')->name('detail.news');
