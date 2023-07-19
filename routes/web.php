<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductividadController;
use App\Http\Controllers\Top3TATController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::resource('productividad_admin/', ProductividadController::class)->names('admin.productividad');
Route::get('/productividad', [ProductividadController::class, 'index_tablero'])->name('productividad');
Route::get('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@edit');
Route::put('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@update');
Route::delete('/productividad_adm/{id}', 'App\Http\Controllers\ProductividadController@destroy');


Route::get('/top3tat', [Top3TATController::class, 'index_tablero'])->name('top3tat');
Route::get('/top3tatadmin', [Top3TATController::class, 'index'])->name('top3tatadmin');
Route::get('/top3tatadmin/{id}', 'App\Http\Controllers\Top3TATController@edit');
Route::put('/top3tatadmin/{id}', 'App\Http\Controllers\Top3TATController@update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
