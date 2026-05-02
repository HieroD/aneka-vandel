<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// All
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/catalog/category/{category?}', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{product}', [ProductController::class, 'show'])->name('catalog.show');

// Auth
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
});

// Authenticated user
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'delete'])->name('logout');
    Route::get('/dashboard/profile', [UserController::class, 'index'])->name('user.profile');
});

// Admin
Route::middleware(['can:admin'])->group(function () {
    Route::get('/dashboard/admin/profile', [AdminController::class, 'index'])->name('admin.profile');
    Route::get('/catalog/create', [ProductController::class, 'create'])->name('catalog.create');
    Route::post('/catalog', [ProductController::class, 'store'])->name('catalog.store');
    Route::get('/catalog/{product}/edit', [ProductController::class, 'edit'])->name('catalog.edit');
    Route::patch('/catalog/{product}', [ProductController::class, 'update'])->name('catalog.update');
    Route::delete('/catalog/{product}', [ProductController::class, 'destroy'])->name('catalog.destroy');
});
