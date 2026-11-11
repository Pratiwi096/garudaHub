<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/projects');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::resource('projects', ProjectController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::resource('projects', ProjectController::class)->except(['index', 'show']);

    Route::post('/projects/{project}/bids', [BidController::class, 'store'])->name('bids.store');
    Route::patch('/bids/{bid}/accept', [BidController::class, 'accept'])->name('bids.accept');
});
