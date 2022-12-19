<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlojamientosController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\ParticipantesController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\SalasController;

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

Route::apiResource('alojamientos', AlojamientosController::class);
Route::apiResource('ciudades', CiudadesController::class);
Route::apiResource('hotele', HotelesController::class);
Route::apiResource('participantes', ParticipantesController::class);
Route::apiResource('partidos', PartidosController::class);
Route::apiResource('salas', SalasController::class);
