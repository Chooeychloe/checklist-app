<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectsController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth','admin'])->group(function () {
    Route::get('admin/dashboard',[HomeController::class,'index']);
    Route::get('/admin/subjects',[SubjectsController::class,'index'])->name('admin/subjects');
    Route::get('/admin/subjects/create',[SubjectsController::class,'create'])->name('admin/subjects/create');
    Route::post('/admin/subjects/save',[SubjectsController::class,'save'])->name('admin/subjects/save');
    Route::get('/admin/subjects/edit/{id}',[SubjectsController::class,'edit'])->name('admin/subjects/edit');
    Route::put('/admin/subjects/edit/{id}',[SubjectsController::class,'update'])->name('admin/subjects/update');
    Route::get('/admin/subjects/delete/{id}',[SubjectsController::class,'delete'])->name('admin/subjects/delete');

});

require __DIR__.'/auth.php';

// Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);