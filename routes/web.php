<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Task
    Route::get('/', [TaskController::class, 'index'])->name('home');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/update/{task}', [TaskController::class, 'update'])->name('update');
    Route::get('/destroy/{task}', [TaskController::class, 'destroy'])->name('destroy');
    Route::get('/destroyIfRealised', [TaskController::class, 'destroyIfRealised'])->name('destroyIfRealised');
    Route::get('/destroyAll', [TaskController::class, 'destroyAll'])->name('destroyAll');
});

require __DIR__ . '/auth.php';
