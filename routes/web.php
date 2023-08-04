<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductividadController;
use App\Http\Controllers\Top3TATController;
use App\Http\Controllers\Top3CAJASController;
use App\Http\Controllers\Top3UNIDADESController;
use App\Http\Controllers\CalendarAseoController;
use App\Http\Controllers\TrenDespachoController;
use App\Http\Controllers\CalendarRutinasController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\FechaTrenController;

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
    return view('auth.login');
});

Route::get('/productividad', 'App\Http\Controllers\ProductividadController@index_tablero')->name('productividad');

Route::get('/novedades', 'App\Http\Controllers\NovedadesController@index_tablero')->name('novedades');

Route::get('/trentablero', 'App\Http\Controllers\TrenDespachoController@index_tablero')->name('tren-tablero');

Route::get('/top3tat', [Top3TATController::class, 'index_tablero'])->name('top3tat');

Route::get('/top3caj', [Top3CAJASController::class, 'index_tablero'])->name('top3caj');

Route::get('/top3uni', [Top3UNIDADESController::class, 'index_tablero'])->name('top3uni');

Route::get('/calendar_tablero', [CalendarAseoController::class, 'index_tablero'])->name('calendar.index_tablero');

Route::get('/calendar-ruti_tablero', [CalendarRutinasController::class, 'index_tablero'])->name('calendar-ruti.index_tablero');

Route::get('/grupos_tablero', [GrupoController::class, 'index_tablero'])->name('grupos.index_tablero');

Route::get('/tablero', function () {
    return view('tablero');
});

Route::middleware('auth')->group(function () {

    Route::resource('productividad_admin/', ProductividadController::class)->names('admin.productividad');
    Route::get('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@edit');
    Route::post('/productividad_adm', 'App\Http\Controllers\ProductividadController@store');
    Route::put('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@update');
    Route::delete('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@destroy');
    Route::post('/productividad_admin/import', 'App\Http\Controllers\ProductividadController@import')->name('productividad.import');

    Route::get('novedad_admin/', [NovedadesController::class, 'index'])->name('admin.novedades');
    Route::get('/novedad_admin/{id}', 'App\Http\Controllers\NovedadesController@edit');
    Route::post('/novedad_admin', 'App\Http\Controllers\NovedadesController@store');
    Route::put('/novedad_admin/{id}', 'App\Http\Controllers\NovedadesController@update');
    Route::delete('/novedad_admin/{id}', 'App\Http\Controllers\NovedadesController@destroy');

    Route::get('/top3tatadmin', [Top3TATController::class, 'index'])->name('top3tatadmin');
    Route::get('/top3tatadminedit/{id}', 'App\Http\Controllers\Top3TATController@edit');
    Route::put('/top3tatadmin/{id}', 'App\Http\Controllers\Top3TATController@update');
    Route::get('/top3tatadmingen/', 'App\Http\Controllers\Top3TATController@create');

    Route::get('/top3cajadmin', [Top3CAJASController::class, 'index'])->name('top3cajadmin');
    Route::get('/top3cajadminedit/{id}', 'App\Http\Controllers\Top3CAJASController@edit');
    Route::put('/top3cajadmin/{id}', 'App\Http\Controllers\Top3CAJASController@update');
    Route::get('/top3cajadmingen/', 'App\Http\Controllers\Top3CAJASController@create');

    Route::get('/top3uniadmin', [Top3UNIDADESController::class, 'index'])->name('top3uniadmin');
    Route::get('/top3uniadminedit/{id}', 'App\Http\Controllers\Top3UNIDADESController@edit');
    Route::put('/top3uniadmin/{id}', 'App\Http\Controllers\Top3UNIDADESController@update');
    Route::get('/top3uniadmingen/', 'App\Http\Controllers\Top3UNIDADESController@create');

    Route::get('/trendmin', [TrenDespachoController::class, 'index'])->name('trenadmin');
    Route::get('/trenadminedit/{id}', 'App\Http\Controllers\TrenDespachoController@edit');
    Route::post('/trenadmin', 'App\Http\Controllers\TrenDespachoController@store');
    Route::put('/trenadmin/{id}', 'App\Http\Controllers\TrenDespachoController@update');
    Route::delete('/trenadmin/{id}', 'App\Http\Controllers\TrenDespachoController@destroy');
    Route::get('/trenadmineditmostrar/{id}/{mos}', 'App\Http\Controllers\TrenDespachoController@editmostrar');

    Route::put('/trenadmin_fecha/{id}', 'App\Http\Controllers\FechaTrenController@update');

    Route::get('/calendar', [CalendarAseoController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/show/{id}', [CalendarAseoController::class, 'show'])->name('calendar.show');
    Route::post('/calendar/create', [CalendarAseoController::class, 'create'])->name('calendar.create');
    Route::put('/actualizar_evento/{id}', [CalendarAseoController::class, 'update'])->name('evento.update');
    Route::get('/eliminar_evento/{id}', [CalendarAseoController::class, 'destroy'])->name('evento.destroy');

    Route::get('/calendar_ruti', [CalendarRutinasController::class, 'index'])->name('calendar-ruti.index');
    Route::get('/calendar_ruti/show/{id}', [CalendarRutinasController::class, 'show'])->name('calendar-ruti.show');
    Route::post('/calendar_ruti/create', [CalendarRutinasController::class, 'create'])->name('calendar-ruti.create');

    Route::get('/rutinasedit/{id}', 'App\Http\Controllers\CalendarRutinasController@edit');
    Route::put('/rutinasupdate/{id}', 'App\Http\Controllers\CalendarRutinasController@update');

    Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
    Route::get('/grupos/{grupo}', [GrupoController::class, 'show'])->name('grupos.show');
    Route::get('/grupos-create/{tipo}', [GrupoController::class, 'store'])->name('grupos.store');
    Route::post('/grupos/{grupo}/personas', [PersonaController::class, 'store'])->name('personas.store');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/productividad_ad', function () {
        return redirect('productividad_admin/');
    })->name('admin.productividad');
});
