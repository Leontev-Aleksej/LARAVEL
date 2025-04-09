<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contest', [ContestController::class, 'index'])->name('contest');
Route::post('/contest', [ContestController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('admin');
    Route::post('/admin/{work}/score', [AdminController::class, 'updateScore'])->name('admin.score')->middleware('admin');
    Route::get('/admin/{work}/download', [AdminController::class, 'download'])->name('admin.download')->middleware('admin');
});

require __DIR__.'/auth.php';
