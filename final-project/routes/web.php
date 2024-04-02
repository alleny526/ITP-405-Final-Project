<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $cacheKey = "anime-calendar";
    $seconds = 60;
    $responseObject = Cache::remember($cacheKey, $seconds, function () {
        $response = Http::get("https://api.bgm.tv/calendar");

        return $response->object();
    });

    return view('index',[
        'response' =>$responseObject,
    ]);
})->name('home');

Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login'); // intentionally named "login" per "auth" middleware
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});