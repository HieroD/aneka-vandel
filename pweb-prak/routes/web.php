<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register/user', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login/user', [SessionController::class, 'store'])->name('login.store');
});

// Authenticated
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'delete'])->name('logout');
});

// Admin 
Route::middleware(['can:admin'])->group(function () {
    Route::get('/catalog/create', [ProdukController::class, 'create'])->name('catalog.create');
    Route::post('/catalog/store', [ProdukController::class, 'store'])->name('catalog.store');
    Route::get('/catalog/edit/{id}', [ProdukController::class, 'edit'])->name('catalog.edit');
    Route::patch('/catalog/update/{id}', [ProdukController::class, 'update'])->name('catalog.update');
    Route::delete('/catalog/delete/{id}', [ProdukController::class, 'destroy'])->name('catalog.destroy');
});

Route::get('/catalog/{kategori}', [ProdukController::class, 'index'])->name('catalog.index');
Route::get('/catalog/show/{id}', [ProdukController::class, 'show'])->name('catalog.show');
