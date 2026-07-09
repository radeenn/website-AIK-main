<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/gerakan', [MovementController::class, 'index'])->name('movements.index');
Route::get('/panduan', [MovementController::class, 'index']);
Route::get('/gerakan/{slug}', [MovementController::class, 'show'])->name('movements.show');
Route::get('/identitas', [PageController::class, 'team'])->name('team');
Route::get('/tentang', [PageController::class, 'team']);
Route::get('/kelompok-kami', [PageController::class, 'team']);
Route::get('/tentang-kami', [PageController::class, 'team']);
Route::get('/mode/{kategori}', ModeController::class)->name('mode.switch');
