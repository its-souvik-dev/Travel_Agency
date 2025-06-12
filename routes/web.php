<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomTravelPlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Protected routes go here
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/custom-travel-plan', [CustomTravelPlanController::class, 'create'])->name('custom-travel-plan.create');
    Route::post('/custom-travel-plan', [CustomTravelPlanController::class, 'store'])->name('custom-travel-plan.store');
    Route::get('/travel-plans/{id}', [CustomTravelPlanController::class, 'show'])->name('travel-plans.show');
    Route::get('/travel-plans', [CustomTravelPlanController::class, 'index'])
    ->name('travel-plans.index');
    Route::delete('/travel-plans/{travelPlan}', [CustomTravelPlanController::class, 'destroy'])
    ->name('travel-plans.destroy');

});