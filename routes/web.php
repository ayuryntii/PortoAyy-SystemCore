<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Route yang sudah ada sebelumnya
Route::get('/', function () {
    return view('welcome');
});

Route::get('/belajar-route', function () {
    return 'Selamat Datang di Belajar-Route';
});

Route::get('/dosen', function () {
    return view('dosen');
});

// ========== ROUTE UNTUK TUGAS PORTFOLIO ==========
Route::get('/home', [PortfolioController::class, 'home'])->name('home');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/education', [PortfolioController::class, 'education'])->name('education');
Route::get('/project', [PortfolioController::class, 'project'])->name('project');






