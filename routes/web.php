<?php

use App\Http\Controllers\CustomvotationController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AsuntosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\MatterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ActivityController;
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



Route::middleware(['auth:sanctum', 'verified','changepassword'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    });



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/calendario', [HomeController::class, 'calendar'])->name('home.calendar');
    Route::get('/bitacora', [HomeController::class, 'bitacora'])->name('home.bitacora');
    Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes.index');;
    Route::get('/reportes/laboral/proxima-semana', [ReportesController::class, 'proximaSemana'])->name('reportes.proxima_semana');
    Route::get('/reportes/laboral/conciliacion-prejudicial', [ReportesController::class, 'conciliacionPrejudicial'])->name('reportes.conciliacion_prejudicial');
    Route::get('/reportes/laboral/conciliacion-prejudicial-ahora', [ReportesController::class, 'conciliacionPrejudicialNow'])->name('reportes.conciliacion_prejudicial_now');
    Route::get('/reportes/laboral/conciliacion-prejudicial-fecha', [ReportesController::class, 'conciliacionPrejudicialrangoFechas'])->name('reportes.conciliacion_prejudicial_date');
    Route::get('/reportes/laboral/conciliacion-prejudicial-fecha-excel/{start}/{end}', [ReportesController::class, 'conciliacionPrejudicialDate'])->name('reportes.conciliacion_prejudicial_date_excel');


    Route::get('/reportes/laboral/tribunal', [ReportesController::class, 'tribunal'])->name('reportes.tribunal');
    Route::get('/reportes/laboral/tribunal-ahora', [ReportesController::class, 'tribunalNow'])->name('reportes.tribunal_now');
    Route::get('/reportes/laboral/tribunal-fecha', [ReportesController::class, 'tribunalrangoFechas'])->name('reportes.tribunal_date');
    Route::get('/reportes/laboral/tribunal-fecha-excel/{start}/{end}', [ReportesController::class, 'tribunalDate'])->name('reportes.tribunal_date_excel');

    Route::get('/reportes/laboral/semana-en-curso', [ReportesController::class, 'laboralEstaSemana'])->name('reportes.laboral.semana-en-curso');
    Route::get('/reportes/laboral/rango-fechas', [ReportesController::class, 'rangoFechas'])->name('reportes.laboral.rango-fechas');
    Route::get('/reportes/laboral/rango-fechas-excel/{start}/{end}', [ReportesController::class, 'rangoFechasExcel'])->name('reportes.laboral.rango-fechas-excel');
    Route::middleware(['changepassword'])->group(function () {
        Route::middleware(['permission:Administrator'])->group(function () {
            Route::get('/usuarios', [UsersController::class, 'index'])->name('users.index');
            Route::get('/usuarios/{id}', [UsersController::class, 'edit'])->name('users.edit');
        });
    });
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.index');
    Route::middleware(['permission:Administrator'])->get('/fotos', [EventController::class, 'guestsPhotos'])->name('photos.index');
});

/* Legitimaciones */
Route::middleware(['auth:sanctum', 'verified', 'changepassword'])->group(function () {
    Route::get('/legitimaciones', [EventController::class, 'legitimations'])->name('legitimation.index');


    Route::get('/legitimaciones/crear', [EventController::class, 'createLegitimation'])->name('legitimation.create');
    Route::get('/legitimaciones/asistencia/puerta/{door}', [EventController::class, 'legitimationAttendanceScreen'])->name('legitimation.attendance.screen');
    Route::get('/legitimaciones/padron/{event}', [EventController::class, 'legitimationGuests'])->name('legitimation.guests');
    Route::get('/legitimaciones/sedes/{event}', [EventController::class, 'legitimationLocations'])->name('legitimation.locations');
    Route::get('/legitimaciones/sedes/{event}/{location}', [EventController::class, 'legitimationLocation'])->name('legitimation.locations.location');
    Route::get('/legitimaciones/configuracion/{event}', [EventController::class, 'legitimationConfiguration'])->name('legitimation.configuration');
    Route::get('/legitimaciones/asistencia/{event}', [EventController::class, 'legitimationAttendance'])->name('legitimation.attendance');
    Route::middleware(['permission:Jurídico'])->group(function () {
        Route::get('/legitimaciones/votacion/consolidado/{event}', [EventController::class, 'legitimationVottingConsolidate'])->name('legitimation.votting.consolidate');
        Route::get('/legitimaciones/votacion/final/{event}', [EventController::class, 'legitimationVottingJuridico'])->name('legitimation.votting.juridico');
        Route::get('/legitimaciones/votacion/final/{event}/{location}', [EventController::class, 'legitimationVottingLocationJuridico'])->name('legitimation.votting.locationjuridico');
    });
    Route::get('/legitimaciones/votacion/{event}', [EventController::class, 'legitimationVotting'])->name('legitimation.votting');
    Route::get('/legitimaciones/votacion/{event}/{location}', [EventController::class, 'legitimationVottingLocation'])->name('legitimation.votting.location');
    Route::get('/legitimaciones/seccion/{event}', [EventController::class, 'legitimationVottingSeccion'])->name('legitimation.vottingseccion');
    Route::get('/legitimaciones/seccion/{event}/{location}/{door}', [EventController::class, 'legitimationVottingSeccionLocation'])->name('legitimation.votting.locationseccion');
    Route::get('/legitimaciones/equipo-de-trabajo/{event}', [EventController::class, 'legitimationTeamwork'])->name('legitimation.teamwork.index');

    Route::get('/legitimaciones/evidencia/{event}', [EventController::class, 'legitimationEvidence'])->name('legitimation.evidence.index');
    Route::get('/legitimaciones/evidencia/{event}/{evidence}', [EventController::class, 'legitimationEvidenceEdit'])->name('legitimation.evidence.edit');
    Route::get('/evidencias', [EventController::class, 'legitimationEvidenceTypes'])->name('legitimation.evidence.types');
    Route::get('/evidencias/crear', [EventController::class, 'legitimationEvidenceTypesCreate'])->name('legitimation.evidence.types.create');
    Route::get('/evidencias/{evidence}', [EventController::class, 'legitimationEvidenceTypesEdit'])->name('legitimation.evidence.types.edit');
    Route::middleware(['permission:Jurídico'])->group(function () {
        Route::get('/solicitar/evidencias/{event}/{location}', [EventController::class, 'legitimationEvidenceRequired'])->name('legitimation.evidence.required');
    });
    Route::get('/subir/evidencias/{event}/{location}', [EventController::class, 'legitimationEvidenceUpload'])->name('legitimation.evidence.upload');

    Route::get('/legitimaciones/archivo/{event}', [EventController::class, 'legitimationArchive'])->name('legitimation.archive.index');
    Route::middleware(['permission:Jurídico'])->group(function () {
        Route::get('/legitimaciones/archivo/{event}/{location}', [EventController::class, 'legitimationArchiveUpload'])->name('legitimation.archive.upload');
    });

    Route::get('/legitimaciones/credenciales/{event}', [EventController::class, 'credentials'])->name('legitimation.credentials.index');

    Route::get('/legitimaciones/estadisticas/{event}', [EventController::class, 'statistics'])->name('legitimation.statistics');
    Route::get('/legitimaciones/{event}', [EventController::class, 'legitimation'])->name('legitimation.show');
    Route::get('/tester/{location}/{door}', [EventController::class, 'tester'])->name('legitimation.tester');
    Route::middleware(['permission:Administrator'])->get('/reportes/{event}', [ReportController::class, 'index'])->name('legitimation.reports.index');
    Route::get('/puertas/{event}', [ReportController::class, 'doors'])->name('legitimation.doors.index');
    Route::get('/legitimaciones/consultas/crear/{event}', [CustomvotationController::class, 'create'])->name('legitimation.customvotation.create');
    Route::get('/legitimaciones/consultas/votacion/{event}/{votation}', [CustomvotationController::class, 'votation'])->name('legitimation.customvotation.votation');
    Route::get('/legitimaciones/consultas/view/{event}', [CustomvotationController::class, 'view'])->name('legitimation.customvotation.view');
    Route::get('/legitimaciones/consultas/view/1/{event}', [CustomvotationController::class, 'asistencia'])->name('legitimation.customvotation.asistencia');
    Route::get('/legitimaciones/consultas/view/2/{event}', [CustomvotationController::class, 'votacion'])->name('legitimation.customvotation.votacion');
    Route::get('/legitimaciones/consultas/{event}', [CustomvotationController::class, 'index'])->name('legitimation.customvotation');


    #Matters
    Route::get('/temas', [MatterController::class, 'index'])->name('matters.index');
    Route::get('/temas/nuevo', [MatterController::class, 'create'])->name('matters.create');
    Route::get('/temas/editar/{matter}', [MatterController::class, 'edit'])->name('matters.edit');

    #Subjects
    Route::get('/temas/{matter}', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/asuntos/ver/{subject}', [SubjectController::class, 'view'])->name('subjects.subject.view');
    Route::get('/asuntos/archivos/{subject}', [SubjectController::class, 'attachments'])->name('subjects.subject.attachments');
    Route::get('/asuntos/actuaciones/{subject}', [SubjectController::class, 'tasks'])->name('subjects.subject.tasks');
    Route::get('/asuntos/nuevo/{matter}', [SubjectController::class, 'create'])->name('subjects.create');

    #Activities
    Route::get('/actividades', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/importer', [HomeController::class, 'importer'])->name('importer.index');


    Route::get('/test/empresas', [TestController::class, 'empresas'])->name('test.empresas');
    Route::get('/test/cfe', [TestController::class, 'cfe'])->name('test.cfe');
    Route::get('/test/contratos', [TestController::class, 'contratos'])->name('test.contratos');

    Route::get('/empresas', [EmpresasController::class, 'index'])->name('empresas.index');
    Route::get('/empresas/crear', [EmpresasController::class, 'create'])->name('empresas.create');
    Route::get('/empresas/crear/{folder}', [EmpresasController::class, 'createChild'])->name('empresas.folder.create');
    Route::get('/empresas/{folder}', [EmpresasController::class, 'folder'])->name('empresas.folder.index');
    Route::get('/empresas/{folder}/file', [EmpresasController::class, 'file'])->name('empresas.folder.file');
});
