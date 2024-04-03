<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;

use App\Models\Anime;

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

    // Route::get('/database', function () {
    //     $response = Http::get("https://api.bgm.tv/calendar")->object();

    //     for($i = 0; $i<7; $i++) {
    //         foreach ($response[$i]->items as $anime) {
    //             $animeObject = new Anime();
    //             $animeObject->anime_id = $anime->id;
    //             $animeObject->name = $anime->name;
    //             $animeObject->thumbnail_link = $anime->images ? $anime->images->small : null;
    //             $animeObject->save();
    //         }
    //     }
    // });

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

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
Route::post('/favorites/{anime_id}', [FavoriteController::class, 'store'])->name('favorites.store');
Route::post('/favorites/delete/{anime_id}', [FavoriteController::class, 'delete'])->name('favorites.delete');

Route::get('/comments/{anime_id}', [CommentController::class, 'show'])->name('comments');
Route::post('/comments/{anime_id}', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{comment_id}', [CommentController::class, 'update'])->name('comments.update');
Route::post('/comments/delete/{comment_id}', [CommentController::class, 'delete'])->name('comments.delete');