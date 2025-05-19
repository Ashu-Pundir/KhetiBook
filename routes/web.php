<?php

use App\Http\Controllers\CropController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;

// Public Routes
Route::get('/', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', [UserController::class, 'create'])->name('register.submit');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Protected Routes (Require Login)
Route::middleware([Authenticate::class])->group(function () {

    Route::get('/dashboard', [CropController::class, 'index'])->name('crop.dashboard');
    Route::post('/dashboard', [CropController::class, 'index'])->name('crop.submit');

    Route::get('/addcrop', [CropController::class, 'create'])->name('crop.addcrop');
    Route::post('/addcrop', [CropController::class, 'store'])->name('crop.store');

    // Add other crop-related routes here if needed
    Route::post('/crop/update/{id}', [CropController::class, 'update'])->name('crop.update');
    Route::get('/crop/edit/{id}', [CropController::class, 'edit'])->name('crop.edit');
    
    Route::delete('/crop/delete/{id}', [CropController::class, 'destroy'])->name('crop.delete');

    Route::get('/generate-pdf', [PDFController::class, 'createPDF'])->name('crops.pdf');

});