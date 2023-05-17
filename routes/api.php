<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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

Route::post('/login/',[AuthController::class, 'login'])->name('auth.login');
Route::post('/logout/',[AuthController::class, 'logout'])->name('auth.logout');
Route::post('/loginAutorizador/',[AuthController::class, 'loginAutorizador'])->name('auth.loginAutorizador');

Route::get('/getEmisor/',[ApiController::class, 'getComboEmisor'])->name('api.getEmisor');
Route::get('/getCentrosCostos/',[ApiController::class, 'getCentrosCostos'])->name('api.getCentrosCostos');
Route::post('/insertCentrosCostos/',[ApiController::class, 'insertCentrosCostos'])->name('api.insertCentrosCostos');
Route::post('/deleteCentrosCostos/',[ApiController::class, 'deleteCentrosCostos'])->name('api.deleteCentrosCostos');
Route::post('/updateCentrosCostos/',[ApiController::class, 'updateCentrosCostos'])->name('api.updateCentrosCostos');
Route::post('/searchCentrosCostos/',[ApiController::class, 'searchCentrosCostos'])->name('api.searchCentrosCostos');

Route::get('/getMovimientoPlanilla/',[ApiController::class, 'getMovimientoPlanilla'])->name('api.getMovimientoPlanilla');
Route::post('/insertMovimientoPlanilla/',[ApiController::class, 'insertMovimientoPlanilla'])->name('api.insertMovimientoPlanilla');
Route::post('/deleteMovimientoPlanilla/',[ApiController::class, 'deleteMovimientoPlanilla'])->name('api.deleteMovimientoPlanilla');
Route::post('/updateMovimientoPlanilla/',[ApiController::class, 'updateMovimientoPlanilla'])->name('api.updateMovimientoPlanilla');
Route::post('/searchMovimientoPlanilla/',[ApiController::class, 'searchMovimientoPlanilla'])->name('api.searchMovimientoPlanilla');



Route::get('/login2/{nombreUsuario}/{passwordUsuario}/{codigoEmisor}',[ApiController::class, 'login2'])->name('api.login2');

