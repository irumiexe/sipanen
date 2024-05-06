<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\HasilPanenController;

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

Route::get('/', [AuthController::class, 'dashboardGuest'])->name('dashboard');
Route::get('/hasil-panen', [HasilPanenController::class, 'hasilPanenGuest'])->name('hasil-panen');
Route::get('get-hasil-panen/{id?}', [HasilPanenController::class, 'getHasilPanen'])->name('hasil-panen.getHasilPanen');

// login route
Route::group(['middleware' => 'guest', 'controller' => AuthController::class], function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'login')->name('login.store');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin/', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AuthController::class, 'dashboardAdmin'])->name('dashboard');

    Route::resource('hasil-panen', HasilPanenController::class)->names('hasil-panen');
    Route::resource('kelurahan', KelurahanController::class)->names('kelurahan');
    Route::resource('kecamatan', KecamatanController::class)->names('kecamatan');
    Route::resource('user-config', UserController::class)->names('user-config');

    Route::get('get-kelurahan-by-kecamatan/{id?}', [KecamatanController::class, 'getKelurahanByKecamatan'])->name('getKelurahanByKecamatan');

    Route::get('hasil-panen/daerah/{nama_daerah?}', [HasilPanenController::class, 'showDaerah'])->name('hasil-panen.showDaerah');

    Route::get('get-kecamatan/{id?}', [KecamatanController::class, 'getKecamatan'])->name('kecamatan.getKecamatan');
    Route::get('get-kelurahan/{id?}', [KelurahanController::class, 'getKelurahan'])->name('kelurahan.getKelurahan');

    Route::get('export', [ExportController::class, 'index'])->name('export.index');
    Route::post('export', [ExportController::class, 'export'])->name('export.export');

    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('profile', [AuthController::class, 'update'])->name('profile.update');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
