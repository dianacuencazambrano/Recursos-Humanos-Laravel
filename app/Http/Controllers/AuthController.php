<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();
        $nombreUsuario = $data['nombreUsuario'];
        $nombreUsuario = strval($nombreUsuario);
        $passwordUsuario = $data['passwordUsuario'];
        $codigoEmisor = $data['codigoEmisor'];

        $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
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

        $token = bin2hex(random_bytes(16));

        // $user = User::where('nombreUsuario', $nombreUsuario)->get();
        // $id = $user[0]->id;
        // if (count($user) > 0) {
        //     $user = User::find($id);
        //     $user->token = $token;
        //     $user->token_expires_at = \Carbon\Carbon::now()->addWeeks(1);
        //     $user->save();
        // }else{
        //     $user = new User();
        //     $user->nombreUsuario = $nombreUsuario;
        //     $user->passwordUsuario = bcrypt($passwordUsuario);
        //     $user->token = $token;
        //     $user->token_expires_at = \Carbon\Carbon::now()->addWeeks(1);
        //     $user->save();
        // }

        return response()->json(['access_token' => $token]);
    }

    public function logout(Request $request)
    {
        try {
            $data = $request->all();
            $nombreUsuario = $data['nombreUsuario'];
            $nombreUsuario = strval($nombreUsuario);

            $user = User::where('nombreUsuario', $nombreUsuario)->get();
            $user->token_expires_at = \Carbon\Carbon::now();
            $user->save();
            return response()->json(['success' => 1, 'message' => 'Sucessfully Logout'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
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
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    
}
