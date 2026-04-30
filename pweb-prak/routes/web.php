<?php

use App\Http\Controllers\ProductController;
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
    Route::get('/catalog/create', [ProductController::class, 'create'])->name('catalog.create');
    Route::post('/catalog/store', [ProductController::class, 'store'])->name('catalog.store');
    Route::get('/catalog/edit/{id}', [ProductController::class, 'edit'])->name('catalog.edit');
    Route::patch('/catalog/update/{id}', [ProductController::class, 'update'])->name('catalog.update');
    Route::delete('/catalog/delete/{id}', [ProductController::class, 'destroy'])->name('catalog.destroy');
});

Route::get('/catalog/{kategori}', [ProductController::class, 'index'])->name('catalog.index');
Route::get('/catalog/show/{id}', [ProductController::class, 'show'])->name('catalog.show');

Route::get('/dashboard/profile', function () {
    return view('dashboard-user.dashboard-profil');
})->name('user-profile');
Route::get('/dashboard/pesanan', function () {
    return view('dashboard-user.dashboard-pesanan');
})->name('user-pesanan');


Route::get('/dashboard/admin/profile', function () {
    return view('dashboard-admin.profile_admin');
})->name('admin-profile');
Route::get('/dashboard/admin/pesanan', function () {
    return view('dashboard-admin.kelola_pesanan_admin');
})->name('admin-pesanan');
Route::get('/dashboard/admin/statistik', function () {
    return view('dashboard-admin.statistik_admin');
})->name('admin-statistik');