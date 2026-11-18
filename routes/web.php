<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/transaksi', [TransactionController::class, 'index'])
    ->name('transaksi.index');

Route::get('/transaksi/{id}', [TransactionController::class, 'show'])
    ->whereNumber('id')
    ->name('transaksi.detail');

Route::get('/kategori', [TransactionController::class, 'categories'])
    ->name('kategori.index');

Route::get('/kategori/{nama}', [TransactionController::class, 'byCategory'])
    ->name('kategori.show');

Route::get('/periode/{bulan}', [TransactionController::class, 'byMonth'])
    ->name('periode.show');

Route::get('/laporan', [ReportController::class, 'index'])
    ->name('laporan.index');

Route::get('/analisis', [ReportController::class, 'analysis'])
    ->name('analisis');
