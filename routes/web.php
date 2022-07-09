<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViaCepController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
Route::match(['get', 'post'], '/', function () {
    return view('home');
});
Route::middleware(['auth'])->group(function () {

    Route::match(['get', 'post'], '/posts', [PostController::class, 'index'])->name('posts.index');
    Route::match(['get', 'post'], '/users/{id}/posts', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::prefix('viacep')->group(
        function () {
            Route::match(['get', 'post'], '', [ViaCepController::class, 'index'])->name("viacep.index");
            Route::match(['get', 'post'], '/{cep}', [ViaCepController::class, 'show'])->name("viacep.show");
        }
    );
});



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
});