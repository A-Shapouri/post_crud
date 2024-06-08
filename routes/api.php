<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', [UserController::class, 'createUser'])->name('auth.register');
Route::post('/auth/login', [UserController::class, 'loginUser'])->name('auth.login');

//Route::apiResource('posts', PostController::class);

//Route::get('/posts', [PostController::class, 'index'])->name('post.index');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
//Route::post('/posts', [PostController::class, 'store'])->middleware(['auth:sanctum'])->name('post.store');
//Route::put('/posts/{post}', [PostController::class, 'update'])->middleware(['auth:sanctum'])->name('post.update');
//Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth:sanctum'])->name('post.destroy');


Route::prefix('posts')
    ->middleware(['with_api_key'])
    ->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
        Route::post('/', [PostController::class, 'store'])->middleware(['auth:sanctum'])->name('post.store');
        Route::put('/{post}', [PostController::class, 'update'])->middleware(['auth:sanctum'])->name('post.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->middleware(['auth:sanctum'])->name('post.destroy');
    });
