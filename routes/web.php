<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/', function () {
    $projects = \App\Models\Project::latest()->take(6)->get();
    $certificates = \App\Models\Certificate::latest()->take(6)->get();
    $sharings = \App\Models\Sharing::latest()->take(6)->get();
    $education = \App\Models\Education::orderBy('urutan')->get();
    
    return view('welcome', compact('projects', 'certificates', 'sharings', 'education'));
})->name('home');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Resources
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('certificates', \App\Http\Controllers\CertificateController::class);
    Route::resource('sharings', \App\Http\Controllers\SharingController::class);
    Route::resource('education', \App\Http\Controllers\EducationController::class);
});
