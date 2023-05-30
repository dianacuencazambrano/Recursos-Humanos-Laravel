<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\CentroCostosController;
use App\Http\Controllers\MovimientoPlantillaController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/** --AuthController*/
Route::post('/login/',[AuthController::class, 'login'])->name('auth.login');
Route::post('/logout/',[AuthController::class, 'logout'])->name('auth.logout');
Route::post('/loginAutorizador/',[AuthController::class, 'loginAutorizador'])->name('auth.loginAutorizador');

/** --ApiController*/
Route::get('/getEmisor/',[ApiController::class, 'getEmisor'])->name('api.getEmisor');
Route::get('/getTiposOperacion/',[ApiController::class, 'getTiposOperacion'])->name('api.getTiposOperacion');
Route::get('/getMovExcepcion1y2/',[ApiController::class, 'getMovExcepcion1y2'])->name('api.getMovExcepcion1y2');
Route::get('/getMovExcepcion3/',[ApiController::class, 'getMovExcepcion3'])->name('api.getMovExcepcion3');
Route::get('/getTrabaAfectaIESS/',[ApiController::class, 'getTrabaAfectaIESS'])->name('api.getTrabaAfectaIESS');
Route::get('/getTrabAfecImpuestoRenta/',[ApiController::class, 'getTrabAfecImpuestoRenta'])->name('api.getTrabAfecImpuestoRenta');
Route::get('/getGenero/',[ApiController::class, 'getGenero'])->name('api.getGenero');
Route::get('/getEstadoTrabajador/',[ApiController::class, 'getEstadoTrabajador'])->name('api.getEstadoTrabajador');
Route::get('/getTipoContrato/',[ApiController::class, 'getTipoContrato'])->name('api.getTipoContrato');
Route::get('/getTipoCese/',[ApiController::class, 'getTipoCese'])->name('api.getTipoCese');
Route::get('/getEstadoCivil/',[ApiController::class, 'getEstadoCivil'])->name('api.getEstadoCivil');
Route::get('/getEsReingreso/',[ApiController::class, 'getEsReingreso'])->name('api.getEsReingreso');
Route::get('/getTipoCuenta/',[ApiController::class, 'getTipoCuenta'])->name('api.getTipoCuenta');
Route::get('/getTipoTrabajador/',[ApiController::class, 'getTipoTrabajador'])->name('api.getTipoTrabajador');

/** --CentroCostosController**/
Route::get('/getCentrosCostos/',[CentroCostosController::class, 'getCentrosCostos'])->name('cencost.getCentrosCostos');
Route::post('/insertCentrosCostos/',[CentroCostosController::class, 'insertCentrosCostos'])->name('cencost.insertCentrosCostos');
Route::post('/deleteCentrosCostos/',[CentroCostosController::class, 'deleteCentrosCostos'])->name('cencost.deleteCentrosCostos');
Route::post('/updateCentrosCostos/',[CentroCostosController::class, 'updateCentrosCostos'])->name('cencost.updateCentrosCostos');
Route::post('/searchCentrosCostos/',[CentroCostosController::class, 'searchCentrosCostos'])->name('cencost.searchCentrosCostos');

/** --MovimientoPlantillaController*/
Route::get('/getMovimientoPlanilla/',[MovimientoPlantillaController::class, 'getMovimientoPlanilla'])->name('movplan.getMovimientoPlanilla');
Route::post('/insertMovimientoPlanilla/',[MovimientoPlantillaController::class, 'insertMovimientoPlanilla'])->name('movplan.insertMovimientoPlanilla');
Route::post('/deleteMovimientoPlanilla/',[MovimientoPlantillaController::class, 'deleteMovimientoPlanilla'])->name('movplan.deleteMovimientoPlanilla');
Route::post('/updateMovimientoPlanilla/',[MovimientoPlantillaController::class, 'updateMovimientoPlanilla'])->name('movplan.updateMovimientoPlanilla');
Route::post('/searchMovimientoPlanilla/',[MovimientoPlantillaController::class, 'searchMovimientoPlanilla'])->name('movplan.searchMovimientoPlanilla');

/** --TrabajadorController*/
Route::post('/getTrabajador/',[TrabajadorController::class, 'getTrabajador'])->name('trabajador.getTrabajador');
Route::post('/insertTrabajador/',[TrabajadorController::class, 'insertTrabajador'])->name('trabajador.insertTrabajador');
Route::post('/deleteTrabajador/',[TrabajadorController::class, 'deleteTrabajador'])->name('trabajador.deleteTrabajador');
Route::post('/updateTrabajador/',[TrabajadorController::class, 'updateTrabajador'])->name('trabajador.updateTrabajador');

