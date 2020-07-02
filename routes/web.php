<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('homepage');

Route::get('/home', 'HomeController@index')->name('home');

// Hindari User agar tidak bisa masuk ke fitur registrasi
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");

// Routes berikut hanya bisa diakses oleh pengguna yang login
Route::group(['middleware' => ['auth']], function () {

    // Routes menu data pengguna 
    Route::resource("users", "UserController");
    Route::delete('usersDeleteAll', 'UserController@deleteAll');

    //Routes menu data karyawan
    Route::resource("karyawans", "KaryawanController");
    Route::delete('karyawansDeleteAll', 'KaryawanController@deleteAll');

    // Routes menu data absensi
    Route::resource("absensis", "AbsensiController");
    Route::delete('absensisDeleteAll', 'AbsensiController@deleteAll');

    // Routes menu pengaturan umum
    Route::resource("perusahaans", "PerusahaanController");

    // Routes menu data penggajian
    Route::resource("penggajians", "PenggajianController");
    Route::match(['put', 'patch'], '/penggajian/update/{id}', 'PenggajianController@perbarui');
    Route::delete('penggajiansDeleteAll', 'PenggajianController@deleteAll');

    // Routes menu data penggajian
    Route::resource("gajis", "GajiController");

    // Routes menu Laporan
    Route::resource("laporans", "LaporanController");

    // Routes print slip dan laporan
    Route::get('/cetak/slip/{nama}/{bulan}/{tahun}', 'CetakController@slip_pdf');
    Route::get('/cetak/laporan/{bulan}/{tahun}', 'CetakController@laporan_pdf');
    Route::get('/cetak/slip/all', 'CetakController@cetak_semua');
});

// routes untuk Auth (Login, register, lupa password)
Auth::routes();
