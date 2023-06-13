<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class MovimientoPlantillaController extends Controller
{
    public function getMovimientoPlanilla()
    {
        //try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/MovimientoPlanillaSelect';

            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            //return response()->json(['success' => 1, 'message' => $response[0]], 200);
        /* } catch (\Exception $th) {
            //return response()->json(['success' => 0, 'message' => $th], 201);
            return $th;
        } */
    }

    public function insertMovimientoPlanilla(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/MovimientoPlanillaInsert?conceptos='.$request->conceptos.'&prioridad='.$request->prioridad.'&tipooperacion='.$request->tipooperacion.'&cuenta1='.$request->cuenta1.'&cuenta2='.$request->cuenta2.'&cuenta3='.$request->cuenta3.'&cuenta4='.$request->cuenta4.'&MovimientoExcepcion1='.$request->MovimientoExcepcion1.'&MovimientoExcepcion2='.$request->MovimientoExcepcion2.'&MovimientoExcepcion3='.$request->MovimientoExcepcion3.'&Traba_Aplica_iess='.$request->Traba_Aplica_iess.'&Traba_Proyecto_imp_renta='.$request->Traba_Proyecto_imp_renta.'&Aplica_Proy_Renta='.$request->Aplica_Proy_Renta.'&Empresa_Afecta_Iess='.$request->Empresa_Afecta_Iess;
            //return $url;
            $response = Http::get($url);
            $response = $response->getBody();
            return response()->json(['success' => 1, 'message' => $response, 'url' => $url], 200);
            // if ($response == '') {
            //     return response()->json(['success' => 0, 'message' => 'El Centro de Costo ya existe'], 201);
            // } else {
            //     return response()->json(['success' => 1, 'message' => $response[0]], 200);
            // }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function updateMovimientoPlanilla(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/MovimientoPlanillaUpdate?codigoplanilla='.$request->codigoplanilla.'&conceptos='.$request->conceptos.'&prioridad='.$request->prioridad.'&tipooperacion='.$request->tipooperacion.'&cuenta1='.$request->cuenta1.'&cuenta2='.$request->cuenta2.'&cuenta3='.$request->cuenta3.'&cuenta4='.$request->cuenta4.'&MovimientoExcepcion1='.$request->MovimientoExcepcion1.'&MovimientoExcepcion2='.$request->MovimientoExcepcion2.'&MovimientoExcepcion3='.$request->MovimientoExcepcion3.'&Traba_Aplica_iess='.$request->Traba_Aplica_iess.'&Traba_Proyecto_imp_renta='.$request->Traba_Proyecto_imp_renta.'&Aplica_Proy_Renta='.$request->Aplica_Proy_Renta.'&Empresa_Afecta_Iess='.$request->Empresa_Afecta_Iess;
            $response = Http::get($url);
            $response = $response->getBody();
            return response()->json(['success' => 1, 'message' => $response], 200);
            /* if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Actualizacíón Correcta') {
                return response()->json(['success' => 0, 'message' => 'No se pudo actualizar'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            } */
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function deleteMovimientoPlanilla(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/MovimeintoPlanillaDelete?codigomovimiento=' . $request->codigomovimiento . '&descripcionomovimiento=' . $request->descripcionomovimiento;

            $response = Http::get($url);
            return response()->json(['success' => 1, 'message' => $response[0]['Concepto']], 200);
            /* if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Eliminación Correcta') {
                return response()->json(['success' => 0, 'message' => 'No se pudo eliminar'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            } */
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function searchMovimientoPlanilla(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/MovimientoPlanillaSearch?Concepto='.$request->Concepto;

            $response = Http::get($url);
            return $response;
            if (!$response) {
                return response()->json(['success' => 0, 'message' => 'No se encontraron registros'], 201);
            } else {
                return $response;
            }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
}
