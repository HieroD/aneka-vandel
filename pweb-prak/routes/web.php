<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');});
Route::get('/about', function () {return view('about');});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register/user', [RegisterController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login/user', [SessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'delete']);
});

//admin
Route::middleware(['can:admin'])->group(function () {
    Route::get('/catalog/edit/{id}', [ProdukController::class, 'edit']);
    Route::patch('/catalog/update/{id}', [ProdukController::class, 'update']);
    Route::get('/catalog/create', [ProdukController::class, 'create']);
    Route::post('/catalog/store', [ProdukController::class, 'store']);
    Route::delete('/catalog/delete/{id}', [ProdukController::class, 'destroy']);
});

Route::get('/catalog/{kategori}', [ProdukController::class, 'index']);
Route::get('/catalog/{id}', [ProdukController::class, 'show']);

Route::view('/dashboard-pesanan', 'dashboard-user.dashboard-pesanan');
Route::view('/dashboard-profil', 'dashboard-user.dashboard-profil');


