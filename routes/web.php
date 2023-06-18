<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('auth');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('news')->middleware('auth')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/create', [NewsController::class, 'create'])->name('newsCreate');
    Route::post('/store', [NewsController::class, 'store'])->name('newsStore');
    Route::post('/update', [NewsController::class, 'update'])->name('newsUpdate');
    Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('newsDelete');
    Route::get('/{id}', [NewsController::class, 'edit'])->name('newsEdit');
});
Route::prefix('tags')->middleware('auth')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('tags');
    Route::get('/create', [TagController::class, 'create'])->name('tagCreate');
    Route::post('/store', [TagController::class, 'store'])->name('tagStore');
    Route::post('/update', [TagController::class, 'update'])->name('tagUpdate');
    Route::get('/delete/{id}', [TagController::class, 'delete'])->name('tagDelete');
    Route::get('/{id}', [TagController::class, 'edit'])->name('tagEdit');
});
Route::prefix('images')->middleware('auth')->group(function () {
    Route::get('/', [ImagesController::class, 'index'])->name('images');
    Route::get('/create', [ImagesController::class, 'create'])->name('imageCreate');
    Route::post('/store', [ImagesController::class, 'store'])->name('imageStore');
    Route::post('/update', [ImagesController::class, 'update'])->name('imageUpdate');
    Route::get('/delete/{id}', [ImagesController::class, 'delete'])->name('imageDelete');
    Route::get('/{id}', [ImagesController::class, 'edit'])->name('imageEdit');
});
Route::prefix('videos')->middleware('auth')->group(function () {
    Route::get('/', [VideosController::class, 'index'])->name('videos');
    Route::get('/create', [VideosController::class, 'create'])->name('videoCreate');
    Route::post('/store', [VideosController::class, 'store'])->name('videoStore');
    Route::post('/update', [VideosController::class, 'update'])->name('videoUpdate');
    Route::get('/delete/{id}', [VideosController::class, 'delete'])->name('videoDelete');
    Route::get('/{id}', [VideosController::class, 'edit'])->name('videoEdit');
});


