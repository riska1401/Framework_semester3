<?php

// Mengimpor facade Route yang digunakan untuk mendefinisikan routing HTTP di Laravel
use Illuminate\Support\Facades\Route;
// Mengimpor kelas controller MahasiswaController dari namespace App\Http\Controllers
use App\Http\Controllers\MahasiswaController;
// Mengimpor kelas controller HomeController
use App\Http\Controllers\HomeController;
// Mengimpor kelas controller PegawaiController
use App\Http\Controllers\PegawaiController;


// Mendefinisikan route HTTP GET untuk URL root '/' yang langsung mengembalikan view 'welcome'
// Route ini biasanya halaman utama atau landing page aplikasi
Route::get('/', function () {
    return view('welcome');
});


// Mendefinisikan route GET untuk URL '/pcr' yang mengembalikan string teks sebagai response
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});


// Mendefinisikan route GET untuk URL '/mahasiswa' yang mengembalikan string teks 'Halo Mahasiswa'
// Ini adalah response sederhana tanpa menggunakan controller
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});


// Mendefinisikan route GET dengan parameter route {param1}
// Parameter ini akan diambil dari URL dan dikirim sebagai argumen fungsi
// Route ini mengembalikan string yang menyisipkan nilai param1 pada kalimat
Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});


// Mendefinisikan route GET lagi pada URL '/mahasiswa' (duplikat dengan yang sebelumnya)
// Namun route ini diberi nama rute ('mahasiswa.show') untuk identifikasi dalam aplikasi
// Meski duplikat, ini akan menimpa route sebelumnya karena URL sama
Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');



// Mendefinisikan route GET dengan parameter {param1} yang dihubungkan dengan method 'show' di MahasiswaController
// Parameter param1 akan diteruskan ke method show sebagai argumen
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);



// Mendefinisikan route GET untuk URL '/home' yang akan memanggil method 'index' pada HomeController
// Biasanya menampilkan halaman dashboard atau halaman utama setelah login
Route::get('/home', [HomeController::class, 'index']);


// Mendefinisikan route GET untuk URL '/pegawai' yang akan memanggil method 'index' pada PegawaiController
// Ini untuk menampilkan daftar pegawai atau halaman pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);
