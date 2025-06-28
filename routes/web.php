<?php

use Illuminate\Support\Facades\Route;

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route dashboard default Jetstream (bisa dihapus/ubah jika tidak dipakai)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route dashboard untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\Admin\DashboardController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::delete('/admin/portfolios/{portfolio}', [App\Http\Controllers\Admin\DashboardController::class, 'destroyPortfolio'])->name('admin.portfolios.destroy');
});

// Route dashboard & CRUD portfolios untuk user
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('portfolios', App\Http\Controllers\User\PortfolioController::class);
});

// Redirect otomatis setelah login
Route::get('/redirect-by-role', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }
    return redirect('/user/portfolios');
})->middleware(['auth']);

// Galeri portofolio publik
Route::get('/portfolios', [App\Http\Controllers\PortfolioGalleryController::class, 'index'])->name('portfolios.gallery');

// CRUD portofolio untuk admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('portfolios', App\Http\Controllers\Admin\PortfolioController::class);
});