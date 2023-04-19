<?php

use App\Http\Controllers\ApiController;
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

Route::post('/login/',[ApiController::class, 'login'])->name('api.login');
Route::get('/getEmisor/',[ApiController::class, 'getComboEmisor'])->name('api.getEmisor');

Route::get('/login2/{nombreUsuario}/{passwordUsuario}/{codigoEmisor}',[ApiController::class, 'login'])->name('api.login2');

