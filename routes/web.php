<?php

use App\Http\Controllers\ConsejoController;
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
    });
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.index');
    Route::middleware(['permission:Administrator'])->get('/fotos', [EventController::class, 'guestsPhotos'])->name('photos.index');
});

/* consejo */
Route::middleware(['auth:sanctum', 'verified', 'changepassword'])->group(function () {
    Route::get('/consejo', [EventController::class, 'legitimations'])->name('legitimation.index');


    Route::get('/consejo/crear', [EventController::class, 'createLegitimation'])->name('legitimation.create');
    Route::get('/consejo/asistencia/puerta/{door}', [EventController::class, 'legitimationAttendanceScreen'])->name('legitimation.attendance.screen');
    Route::get('/consejo/padron/{event}', [EventController::class, 'legitimationGuests'])->name('legitimation.guests');
    Route::get('/consejo/sedes/{event}', [EventController::class, 'legitimationLocations'])->name('legitimation.locations');
    Route::get('/consejo/configuracion/{event}', [EventController::class, 'legitimationConfiguration'])->name('legitimation.configuration');
    Route::get('/consejo/asistencia/{event}', [EventController::class, 'legitimationAttendance'])->name('legitimation.attendance');
    Route::middleware(['permission:Jurídico'])->group(function () {
        Route::get('/consejo/votacion/consolidado/{event}', [EventController::class, 'legitimationVottingConsolidate'])->name('legitimation.votting.consolidate');
        Route::get('/consejo/votacion/final/{event}', [EventController::class, 'legitimationVottingJuridico'])->name('legitimation.votting.juridico');
        Route::get('/consejo/votacion/final/{event}/{location}', [EventController::class, 'legitimationVottingLocationJuridico'])->name('legitimation.votting.locationjuridico');
    });
    Route::get('/consejo/votacion/{event}', [EventController::class, 'legitimationVotting'])->name('legitimation.votting');
    Route::get('/consejo/votacion/{event}/{location}', [EventController::class, 'legitimationVottingLocation'])->name('legitimation.votting.location');
    Route::get('/consejo/equipo-de-trabajo/{event}', [EventController::class, 'legitimationTeamwork'])->name('legitimation.teamwork.index');

    Route::get('/consejo/evidencia/{event}', [EventController::class, 'legitimationEvidence'])->name('legitimation.evidence.index');
    Route::get('/consejo/evidencia/{event}/{evidence}', [EventController::class, 'legitimationEvidenceEdit'])->name('legitimation.evidence.edit');
    Route::get('/evidencias', [EventController::class, 'legitimationEvidenceTypes'])->name('legitimation.evidence.types');
    Route::get('/evidencias/crear', [EventController::class, 'legitimationEvidenceTypesCreate'])->name('legitimation.evidence.types.create');
    Route::get('/evidencias/{evidence}', [EventController::class, 'legitimationEvidenceTypesEdit'])->name('legitimation.evidence.types.edit');
    Route::middleware(['permission:Jurídico'])->group(function () {
        Route::get('/solicitar/evidencias/{event}/{location}', [EventController::class, 'legitimationEvidenceRequired'])->name('legitimation.evidence.required');
    });
    Route::get('/subir/evidencias/{event}/{location}', [EventController::class, 'legitimationEvidenceUpload'])->name('legitimation.evidence.upload');

    Route::get('/consejo/archivo/{event}', [EventController::class, 'legitimationArchive'])->name('legitimation.archive.index');
    Route::middleware(['permission:Jurídico'])->group(function () {
        Route::get('/consejo/archivo/{event}/{location}', [EventController::class, 'legitimationArchiveUpload'])->name('legitimation.archive.upload');
    });

    Route::get('/consejo/estadisticas/{event}', [ConsejoController::class, 'stats'])->name('legitimation.consejo.stats');
    Route::get('/consejo/votaciones/{event}', [ConsejoController::class, 'votaciones'])->name('legitimation.consejo.votaciones');
    Route::middleware(['permission:Administrator'])->group(function () {
        Route::get('/consejo/nuevo/{event}', [ConsejoController::class, 'nuevo'])->name('legitimation.consejo.nuevo');
    });
    Route::get('/consejo/registro/{event}/{consulta}', [ConsejoController::class, 'registro'])->name('legitimation.consejo.registro');

    Route::get('/consejo/{event}', [EventController::class, 'legitimation'])->name('legitimation.show');
});
