<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentGugusController;
use App\Http\Controllers\DocumentSuratController;
use App\Http\Controllers\DocumentLaporanController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('isLogin')->group(function () {
    // Login
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
});

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('checkLogin')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('documents', [DocumentController::class, 'index'])->name('documents');
    Route::get('documents/pdf', [DocumentController::class, 'pdf'])->name('documentsPdf');

    Route::get('/documents/laporan', [DocumentLaporanController::class, 'index'])->name('laporan.index');
    Route::get('/documents/laporan/create', [DocumentLaporanController::class, 'create'])->name('laporan.create');
    Route::post('/documents/laporan', [DocumentLaporanController::class, 'store'])->name('laporan.store');

    Route::get('/documents/surat', [DocumentSuratController::class, 'index'])->name('surat.index');
    Route::get('/documents/surat/create', [DocumentSuratController::class, 'create'])->name('surat.create');
    Route::post('/documents/surat', [DocumentSuratController::class, 'store'])->name('surat.store');

    Route::get('/documents/dokumen-mutu/excel', [DocumentGugusController::class, 'excel'])->name('dokumen.excel');
    Route::get('/documents/dokumen-mutu/pdf', [DocumentGugusController::class, 'pdf'])->name('dokumen.pdf');


    // // Tambahkan route ini untuk Pustakawan
    // Route::prefix('pustakawan')->group(function () {
    //     // Upload Laporan
    //     Route::get('/documents/laporan/create', [DocumentLaporanController::class, 'create'])->name('laporan.create');
    //     Route::post('/documents/laporan/store', [DocumentLaporanController::class, 'store'])->name('laporan.store');

    //     // Upload Surat
    //     Route::get('/documents/surat/create', [DocumentSuratController::class, 'create'])->name('surat.create');
    //     Route::post('/documents/surat/store', [DocumentSuratController::class, 'store'])->name('surat.store');
    // });

    Route::middleware('isAdmin')->group(function () {
        // User
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('user/store', [UserController::class, 'store'])->name('userStore');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
        Route::get('user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('user/pdf', [UserController::class, 'pdf'])->name('userPdf');

        // Dokumen Mutu
        Route::get('/documents/dokumen-mutu', [DocumentGugusController::class, 'index'])->name('dokumen.index');
        Route::get('/documents/dokumen-mutu/create', [DocumentGugusController::class, 'create'])->name('dokumen.create');
        Route::post('/documents/dokumen-mutu', [DocumentGugusController::class, 'store'])->name('dokumen.store');
        Route::get('/documents/dokumen-mutu/edit/{id}', [DocumentGugusController::class, 'edit'])->name('dokumen.edit');
        Route::put('/documents/dokumen-mutu/update/{id}', [DocumentGugusController::class, 'update'])->name('dokumen.update');
        Route::delete('/documents/dokumen-mutu/destroy/{id}', [DocumentGugusController::class, 'destroy'])->name('dokumen.destroy');



        // Laporan

        Route::get('/documents/laporan/edit/{id}', [DocumentLaporanController::class, 'edit'])->name('laporan.edit');
        Route::put('/documents/laporan/update/{id}', [DocumentLaporanController::class, 'update'])->name('laporan.update');
        Route::delete('/documents/laporan/destroy/{id}', [DocumentLaporanController::class, 'destroy'])->name('laporan.destroy');
        Route::get('laporan/excel', [DocumentLaporanController::class, 'exportExcel'])->name('laporan.excel');
        Route::get('laporan/pdf', [DocumentLaporanController::class, 'exportPdf'])->name('laporan.pdf');


        // Surat Menyurat

        Route::get('/documents/surat/edit/{id}', [DocumentSuratController::class, 'edit'])->name('surat.edit');
        Route::put('/documents/surat/update/{id}', [DocumentSuratController::class, 'update'])->name('surat.update');
        Route::delete('/documents/surat/destroy/{id}', [DocumentSuratController::class, 'destroy'])->name('surat.destroy');
        Route::get('surat/excel', [DocumentSuratController::class, 'exportExcel'])->name('surat.excel');
        Route::get('surat/pdf', [DocumentSuratController::class, 'exportPdf'])->name('surat.pdf');



        //Kategori
        Route::get('/kategori.mutu', [KategoriController::class, 'mutu'])->name('kategori.mutu');
        Route::get('/kategori.laporan', [KategoriController::class, 'laporan'])->name('kategori.laporan');
        Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');

        Route::prefix('kategori')->group(function () {
            Route::get('/mutu', [KategoriController::class, 'mutu'])->name('kategori.mutu');
            Route::get('/laporan', [KategoriController::class, 'laporan'])->name('kategori.laporan');
            Route::post('/store', [KategoriController::class, 'store'])->name('kategori.store');
            Route::delete('/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        });

    });

});


