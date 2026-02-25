<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Added imports
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CaseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 1. Routes for EVERYONE who is logged in (Normal Advocates)
Route::middleware('auth')->group(function () {
    // Manual way
    // Route::get('/cases', [CaseController::class, 'index'])->name('cases.index');
    // Route::get('/cases/{id}', [CaseController::class, 'show'])->name('cases.show');

    // Generates the 6 instead of 7 routes
    Route::resource('clients', ClientController::class)->except(['destroy']);

    Route::resource('cases', CaseController::class)->except(['destroy']);
});

// 2. Routes ONLY for Admins (Group Admins)
Route::middleware(['auth', 'admin'])
    ->prefix('admin') // Adds '/admin' to the URL
    ->name('admin.')  // Adds 'admin.' to the Route Name
    ->group(function () {
    // Only admins can see the list of all users/advocates
    // Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index'); [Individual]

    // This generates the 7 routes, but because it's inside the 'admin' group,
    // the URLs will be /admin/users, /admin/users/create, etc.
    Route::resource('users', UserController::class);

    // Only admins can delete
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::delete('/cases/{id}', [CaseController::class, 'destroy'])->name('cases.destroy');
});

require __DIR__.'/auth.php';
