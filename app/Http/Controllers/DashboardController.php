<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\CentroCostosController;
use App\Http\Controllers\MovimientoPlantillaController;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getMovPlanxTipoOperacion(){
        $data = [];
        $contI = 0;
        $contE = 0;
        $ninguno = 0;
        $mov = new MovimientoPlantillaController();
        $movimientos = $mov->getMovimientoPlanilla();
        $movimientos = json_decode($movimientos, true);
        foreach ($movimientos as $movimiento) {
            switch ($movimiento['TipoOperacion']) {
                case 'Ingreso':
                    $contI++;
                    break;
                case 'I':
                    $contI++;
                    break;
                case 'Egreso':
                    $contE++;
                    break;
                case 'E':
                    $contE++;
                    break;
                default:
                    $ninguno++;
                    break;
            }
        }
        $data['ingresos'] = $contI;
        $data['egresos'] = $contE;
        $data['ninguno'] = $ninguno;
        return $data;
    }
    
    public function getTotales(Request $request){
        $data = [];
        $centroCostosController = new CentroCostosController;
        $trabajadorController = new TrabajadorController;
        $movimientoPlantillaController = new MovimientoPlantillaController;

        $centrosCostos = $centroCostosController->getCentrosCostos();
        $centrosCostos = json_decode($centrosCostos);
        $totalCC = count($centrosCostos);

        $trabajadores = $trabajadorController->getTrabajador($request);
        $trabajadores = json_decode($trabajadores);
        $totalTr = count($trabajadores);

        $movPlantilla = $movimientoPlantillaController->getMovimientoPlanilla();
        $movPlantilla = json_decode($movPlantilla);
        $totalMov = count($movPlantilla);

        $data['totalCC'] = $totalCC;
        $data['totalTr'] = $totalTr;
        $data['totalMov'] = $totalMov;
        return $data;

    }
}
