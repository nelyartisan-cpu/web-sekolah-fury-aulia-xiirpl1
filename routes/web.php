<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\AdminGuruController as AdminGuruController;
use App\Http\Controllers\Admin\AdminJurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\AdminEkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\AdminArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\AdminProfilController as AdminProfilController;


/*
|--------------------------------------------------------------------------
| MODELS
|--------------------------------------------------------------------------
*/

use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Artikel;
use App\Models\Guru;


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIC
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| BERANDA
|--------------------------------------------------------------------------
*/

Route::get('/', [BerandaController::class, 'index'])
    ->name('beranda');


/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH
|--------------------------------------------------------------------------
*/

Route::get('/profil', [ProfilController::class, 'index'])
    ->name('profil.index');


/*
|--------------------------------------------------------------------------
| GURU PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/guru', [GuruController::class, 'index'])
    ->name('guru.index');

Route::get('/guru/{guru}', [GuruController::class, 'show'])
    ->name('guru.show');


/*
|--------------------------------------------------------------------------
| JURUSAN PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/jurusan', [JurusanController::class, 'index'])
    ->name('jurusan.index');

Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])
    ->name('jurusan.show');


/*
|--------------------------------------------------------------------------
| EKSTRAKURIKULER PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
    ->name('ekstrakurikuler.index');

Route::get('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'show'])
    ->name('ekstrakurikuler.show');


/*
|--------------------------------------------------------------------------
| ARTIKEL PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel.index');

Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])
    ->name('artikel.show');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| Semua halaman admin harus login terlebih dahulu.
|
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        return redirect()->route('admin.dashboard');

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | ADMIN PANEL
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {


            /*
            |--------------------------------------------------------------------------
            | ADMIN DASHBOARD
            |--------------------------------------------------------------------------
            */

            Route::get('/', function () {

                $jumlahJurusan = Jurusan::count();

                $jumlahEkstrakurikuler = Ekstrakurikuler::count();

                $jumlahArtikel = Artikel::count();

                $jumlahGuru = Guru::count();

                $artikelTerbaru = Artikel::with('kategori')
                    ->latest()
                    ->take(5)
                    ->get();

                return view('dashboard', compact(
                    'jumlahJurusan',
                    'jumlahEkstrakurikuler',
                    'jumlahArtikel',
                    'jumlahGuru',
                    'artikelTerbaru'
                ));

            })->name('dashboard');


            /*
            |--------------------------------------------------------------------------
            | ADMIN GURU
            |--------------------------------------------------------------------------
            |
            | /admin/guru
            |
            */

            // RUTE LAMA

            Route::resource(
                'guru',
                AdminGuruController::class
            );

            // RUTE BARU
            // Route::get('admin/guru', [AdminGuruController::class, 'index'])
            // ->name('admin.guru');


            /*
            |--------------------------------------------------------------------------
            | ADMIN JURUSAN
            |--------------------------------------------------------------------------
            |
            | /admin/jurusan
            |
            */

            Route::resource(
                'jurusan',
                AdminJurusanController::class
            );


            /*
            |--------------------------------------------------------------------------
            | ADMIN EKSTRAKURIKULER
            |--------------------------------------------------------------------------
            |
            | /admin/ekstrakurikuler
            |
            */

            Route::resource(
                'ekstrakurikuler',
                AdminEkstrakurikulerController::class
            );


            /*
            |--------------------------------------------------------------------------
            | ADMIN ARTIKEL
            |--------------------------------------------------------------------------
            |
            | /admin/artikel
            |
            */

            Route::resource(
                'artikel',
                AdminArtikelController::class
            );


            /*
            |--------------------------------------------------------------------------
            | ADMIN PROFIL SEKOLAH
            |--------------------------------------------------------------------------
            |
            | /admin/profil
            |
            */

            Route::get(
                '/profil',
                [AdminProfilController::class, 'edit']
            )->name('profil.edit');

            Route::put(
                '/profil',
                [AdminProfilController::class, 'update']
            )->name('profil.update');

        });

});


/*
|--------------------------------------------------------------------------
| PROFILE AKUN ADMIN
|--------------------------------------------------------------------------
|
| /profile = mengatur akun admin yang sedang login
|
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';