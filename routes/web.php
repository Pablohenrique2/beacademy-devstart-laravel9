<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViaCepController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->group(
    function () {

        Route::match(['get', 'post'], '', [UserController::class, 'index'])->name("user.index");
        Route::match(['get', 'post'], '/{id}', [UserController::class, 'show'])->name("user.show");
    }

);

Route::prefix('viacep')->group(
    function () {
        Route::match(['get', 'post'], '', [ViaCepController::class, 'index'])->name("viacep.index");
        Route::match(['get', 'post'], '/{cep}', [ViaCepController::class, 'show'])->name("viacep.show");
    }
);