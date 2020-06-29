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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

// routes untuk Auth (Login, register, lupa password)
Auth::routes();

// Hindari User agar tidak bisa masuk ke fitur registrasi
Route::match(["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");


// Routes menu data pengguna 
Route::resource("users", "UserController");
Route::delete('usersDeleteAll', 'UserController@deleteAll');

//Routes menu data karyawan
Route::resource("karyawans", "KaryawanController");
Route::delete('karyawansDeleteAll', 'KaryawanController@deleteAll');

// Routes menu data absensi
Route::resource("absensis", "AbsensiController");
Route::get('absensis/{name}', 'AbsensiController@olahTabelKaryawanAbsensi');
Route::delete('absensisDeleteAll', 'AbsensiController@deleteAll');

// Routes menu pengaturan umum
Route::resource("perusahaans", "PerusahaanController");
