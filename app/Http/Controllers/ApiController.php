<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function login($nombreUsuario, $passwordUsuario, $codigoEmisor)
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
        } catch (\Throwable $th) {
            return response()->json(['success' => 0, 'message' => 'Error'], 201);
        }
    }

    public function login2(Request $request)
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
        } catch (\Throwable $th) {
            return response()->json(['success' => 0, 'message' => 'Error'], 201);
        }
    }
}
