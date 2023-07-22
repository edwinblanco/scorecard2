<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductividadController;
use App\Http\Controllers\Top3TATController;
use App\Http\Controllers\Top3CAJASController;
use App\Http\Controllers\CalendarAseoController;
use App\Http\Controllers\TrenDespachoController;

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

Route::get('/trentablero', 'App\Http\Controllers\TrenDespachoController@index_tablero')->name('tren-tablero');

Route::get('/top3tat', [Top3TATController::class, 'index_tablero'])->name('top3tat');

Route::get('/top3caj', [Top3CAJASController::class, 'index_tablero'])->name('top3caj');

Route::get('/calendar_tablero', [CalendarAseoController::class, 'index_tablero'])->name('calendar.index_tablero');

Route::middleware('auth')->group(function () {

    Route::resource('productividad_admin/', ProductividadController::class)->names('admin.productividad');
    Route::get('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@edit');
    Route::put('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@update');
    Route::delete('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@destroy');

    Route::get('/top3tatadmin', [Top3TATController::class, 'index'])->name('top3tatadmin');
    Route::get('/top3tatadminedit/{id}', 'App\Http\Controllers\Top3TATController@edit');
    Route::put('/top3tatadmin/{id}', 'App\Http\Controllers\Top3TATController@update');
    Route::get('/top3tatadmingen/', 'App\Http\Controllers\Top3TATController@create');

    Route::get('/top3cajadmin', [Top3CAJASController::class, 'index'])->name('top3cajadmin');
    Route::get('/top3cajadminedit/{id}', 'App\Http\Controllers\Top3CAJASController@edit');
    Route::put('/top3cajadmin/{id}', 'App\Http\Controllers\Top3CAJASController@update');
    Route::get('/top3cajadmingen/', 'App\Http\Controllers\Top3CAJASController@create');

    Route::get('/trendmin', [TrenDespachoController::class, 'index'])->name('trenadmin');
    Route::get('/trenadminedit/{id}', 'App\Http\Controllers\TrenDespachoController@edit');
    Route::post('/trenadmin', 'App\Http\Controllers\TrenDespachoController@store');
    Route::put('/trenadmin/{id}', 'App\Http\Controllers\TrenDespachoController@update');
    Route::delete('/trenadmin/{id}', 'App\Http\Controllers\TrenDespachoController@destroy');

    Route::get('/calendar', [CalendarAseoController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/show/{id}', [CalendarAseoController::class, 'show'])->name('calendar.show');
    Route::post('/calendar/create', [CalendarAseoController::class, 'create'])->name('calendar.create');

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

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
