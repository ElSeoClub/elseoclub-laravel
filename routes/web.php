<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

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

/* Legitimaciones */
Route::middleware(['auth:sanctum', 'verified', 'changepassword'])->group(function () {
    Route::get('/legitimaciones', [EventController::class, 'legitimations'])->name('legitimation.index');


    Route::get('/legitimaciones/crear', [EventController::class, 'createLegitimation'])->name('legitimation.create');
    Route::get('/legitimaciones/asistencia/puerta/{door}', [EventController::class, 'legitimationAttendanceScreen'])->name('legitimation.attendance.screen');
    Route::get('/legitimaciones/padron/{event}', [EventController::class, 'legitimationGuests'])->name('legitimation.guests');
    Route::get('/legitimaciones/sedes/{event}', [EventController::class, 'legitimationLocations'])->name('legitimation.locations');
    Route::get('/legitimaciones/configuracion/{event}', [EventController::class, 'legitimationConfiguration'])->name('legitimation.configuration');
    Route::get('/legitimaciones/asistencia/{event}', [EventController::class, 'legitimationAttendance'])->name('legitimation.attendance');
    Route::get('/legitimaciones/votacion/{event}', [EventController::class, 'legitimationVotting'])->name('legitimation.votting');
    Route::get('/legitimaciones/{event}', [EventController::class, 'legitimation'])->name('legitimation.show');
});
