<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return redirect('login');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['changepassword'])->group(function () {
        Route::middleware(['permission:Administrator'])->group(function () {
            Route::get('/usuarios', [UsersController::class, 'index'])->name('users.index');
            Route::get('/usuarios/{id}', [UsersController::class, 'edit'])->name('users.edit');
        });
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.index');
});
