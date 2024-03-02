<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StafController;
use App\Http\Controllers\Petugas_lapanganController;
use App\Http\Controllers\SurattugasController;
use App\Http\Controllers\SuratpenugasanController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function ()
    {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('staf', StafController::class);
    Route::resource('petugas', Petugas_lapanganController::class);
    Route::resource('surattugas', SurattugasController::class);
    Route::resource('suratpenugasan', SuratpenugasanController::class);
    Route::resource('penerimaan', PenerimaanController::class);
    Route::resource('evaluasi', EvaluasiController::class);
    Route::resource('user', UserController::class);


    /* Route::get('/laporan-st', 'LaporanController@cetakForm')->name('laporan-st'); */
    /* Route::get('/laporan/lp-surattugas', function () {return view('laporan.lp-surattugas');})->name('lp-surattugas'); */
    //get data laporan
    Route::get('/get-data', [LaporanController::class, 'getData']);
    Route::get('/get-data-sp', [LaporanController::class, 'getSp']);
    Route::get('/get-data-pn', [LaporanController::class, 'getPn']);
    Route::get('/get-data-ev', [LaporanController::class, 'getEv']);
    Route::get('/get-data-pe', [LaporanController::class, 'getPe']);

    //Laporan
    Route::get('/laporan/lp-surattugas', [LaporanController::class, 'lpSuratTugas']);
    Route::get('/laporan/lp-suratpenugasan', [LaporanController::class, 'lpSuratPenugasan']);
    Route::get('/laporan/lp-penerimaan', [LaporanController::class, 'lpPenerimaan']);
    Route::get('/laporan/lp-evaluasi', [LaporanController::class, 'lpEvaluasi']);
    Route::get('/laporan/lp-performa', [LaporanController::class, 'lpPerforma']);

    //Cetak Laporan
    Route::get('/laporan/cetak/cetak-st', [LaporanController::class, 'CtkSt'])->name('CtkSt');
    Route::get('/laporan/cetak/cetak-sp', [LaporanController::class, 'CtkSp'])->name('CtkSp');
    Route::get('/laporan/cetak/cetak-pn', [LaporanController::class, 'CtkPn'])->name('CtkPn');
    Route::get('/laporan/cetak/cetak-ev', [LaporanController::class, 'CtkEv'])->name('CtkEv');
    Route::get('/laporan/cetak/cetak-pe', [LaporanController::class, 'CtkPe'])->name('CtkPe');

});
