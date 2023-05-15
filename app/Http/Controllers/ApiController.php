<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        try {
            $data = $request->all();
            $nombreUsuario = $data['nombreUsuario'];
            $passwordUsuario = $data['passwordUsuario'];
            $codigoEmisor = $data['codigoEmisor'];

            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Usuarios?usuario=' . $nombreUsuario . '&password=' . $passwordUsuario;

            $response = Http::get($url);
            $aux = (string) $response->getBody();

            if (strcmp($aux, "error") == 0) {
                return response()->json(['success' => 0, 'message' => 'Existen errores en los datos ingresados'], 201);
            }

            if ($response[0]['Emisor'] != $codigoEmisor) {
                return response()->json(['success' => 0, 'message' => 'El codigo del Emisor no coincide'], 201);
            }

            if ($response[0]['OBSERVACION'] === 'CONTRASEÑA INVALIDA') {
                return response()->json(['success' => 0, 'message' => 'Contraseña invalida'], 201);
            }

            return response()->json(['success' => 1, 'message' => $response[0]], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }


    public function getComboEmisor()
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/GetEmisor';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function getCentrosCostos()
    {
        try {
            $client = new Client();
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/CentroCostosSelect';
            $res = $client->request('GET', $url);

            $res = json_decode($res->getBody());
            return $res;

            /* $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/CentroCostosSelect';

            $response = Http::get($url);
            return $response; */
            //return response()->json(['success' => 1, 'message' => $response[0]], 200);
        } catch (\Exception $th) {
            //return response()->json(['success' => 0, 'message' => $th], 201);
            return $th;
        }
    }
    public function insertCentrosCostos(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/CentroCostosInsert?codigocentrocostos=' . $request->codigocentrocostos . '&descripcioncentrocostos=' . $request->descripcioncentrocostos;

            $response = Http::get($url);
            if ($response == '') {
                return response()->json(['success' => 0, 'message' => 'El Centro de Costo ya existe'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]], 200);
            }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function deleteCentrosCostos(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
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
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/CentroCostosUpdate?codigocentrocostos=' . $request->codigocentrocostos . '&descripcioncentrocostos=' . $request->descripcioncentrocostos;

            $response = Http::get($url);

            if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Actualizacíón Correcta') {
                return response()->json(['success' => 0, 'message' => 'No se pudo actualizar'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => '$th'], 201);
        }
    }

    public function searchCentrosCostos(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
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




    public function login2($nombreUsuario, $passwordUsuario, $codigoEmisor)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Usuarios?usuario=' . $nombreUsuario . '&password=' . $passwordUsuario;

            $response = Http::get($url);
            $aux = (string) $response->getBody();

            if (strcmp($aux, "error") == 0) {
                return response()->json(['success' => 0, 'message' => 'Existen errores en los datos ingresados'], 201);
            }

            if ($response[0]['Emisor'] != $codigoEmisor) {
                return response()->json(['success' => 0, 'message' => 'El codigo del Emisor no coincide'], 201);
            }

            if ($response[0]['OBSERVACION'] === 'CONTRASEÑA INVALIDA') {
                return response()->json(['success' => 0, 'message' => 'Contraseña invalida'], 201);
            }

            return response()->json(['success' => 1, 'message' => $response[0]], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
}
