<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class CentroCostosController extends Controller
{
    public function getCentrosCostos()
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/CentroCostosSelect';

            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            //return response()->json(['success' => 1, 'message' => $response[0]], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
            //return $th;
        }
    }
    public function insertCentrosCostos(Request $request)
    {
        //try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL.'/api/Varios/CentroCostosInsert?codigocentrocostos='.$request['codigocentrocostos'].'&descripcioncentrocostos='.$request['descripcioncentrocostos'];
            //return $url;
            $response = Http::get($url);
            return $response[0]['Mensaje'];
            if ($response == '') {
                return response()->json(['success' => 0, 'message' => 'El Centro de Costo ya existe'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]], 200);
            }
        //} catch (\Exception $th) {
            //return response()->json(['success' => 0, 'message' => $th], 201);
        //}
    }

    public function deleteCentrosCostos(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/CentroCostosDelete?codigocentrocostos=' . $request->codigocentrocostos . '&descripcioncentrocostos=' . $request->descripcioncentrocostos;

            $response = Http::get($url);

            if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Eliminación Correcta') {
                return response()->json(['success' => 0, 'message' => 'No se pudo eliminar'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function updateCentrosCostos(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/CentroCostosUpdate?codigocentrocostos=' . $request->codigocentrocostos . '&descripcioncentrocostos=' . $request->descripcioncentrocostos;

            $response = Http::get($url);

            if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Actualizacíón Correcta') {
                return response()->json(['success' => 0, 'message' => 'No se pudo actualizar'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function searchCentrosCostos(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/CentroCostosSearch?descripcioncentrocostos=' . $request->descripcioncentrocostos;

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
