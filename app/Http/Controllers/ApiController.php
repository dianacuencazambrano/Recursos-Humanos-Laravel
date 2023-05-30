<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getEmisor()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/GetEmisor';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    //[{"CodigoTipooperacion":"Egresos","NombreOperacion":"E"},{"CodigoTipooperacion":"Ingresos","NombreOperacion":"I"}]
    public function getTiposOperacion()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TipoOperacion';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            //return $th;
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    //[{"CodigoMovimientoExce":"Movimiento Planilla","DesripMovimientoExce":"M"},
    //{"CodigoMovimientoExce":"Cuenta Corriente","DesripMovimientoExce":"C"},
    //{"CodigoMovimientoExce":"Horas Movimiento Planilla","DesripMovimientoExce":"H"}]
    public function getMovExcepcion1y2()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/MovimientosExcepcion1y2';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    // [{"CodigoMovimientoExce":"Costa","DesripMovimientoExce":"C"},
    // {"CodigoMovimientoExce":"No Aplica","DesripMovimientoExce":"N"},
    // {"CodigoMovimientoExce":"No Procesar","DesripMovimientoExce":"X"},
    // {"CodigoMovimientoExce":"Sierra","DesripMovimientoExce":"S"}]
    public function getMovExcepcion3()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/MovimientosExcepcion3';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
    
    // [{"CodigoMovimientoExce":"Si","DesripMovimientoExce":"1"},
    // {"CodigoMovimientoExce":"No","DesripMovimientoExce":"0"}]
    public function getTrabaAfectaIESS()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TrabaAfectaIESS';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    // [{"CodigoMovimientoExce":"Aplica","DesripMovimientoExce":"1"},
    // {"CodigoMovimientoExce":"No Aplica","DesripMovimientoExce":"0"}]
    public function getTrabAfecImpuestoRenta()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TrabAfecImpuestoRenta';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    // [{"Codigo":"Masculino ","Descripcion":"M"},
    // {"Codigo":"Femenino","Descripcion":"F"}]
    public function getGenero()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/Genero';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    // [{"Codigo":"Vacaciones","Descripcion":"V"},
    // {"Codigo":"Cesado","Descripcion":"*"},
    // {"Codigo":"Activo ","Descripcion":"A"}]
    public function getEstadoTrabajador()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/EstadoTrabajador';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }


    // [{"Codigo":"De_Aprendizaje ","Descripcion":"7"},
    // {"Codigo":"Servicios_Domésticos","Descripcion":"10"},
    // {"Codigo":"De_Temporada","Descripcion":"6"},
    // {"Codigo":"Evento_Continuo ","Descripcion":"4"},
    // {"Codigo":"Indefinido ","Descripcion":"1"},
    // {"Codigo":"Entre_Artesanos_Operarios","Descripcion":"9"},
    // {"Codigo":"Evento_Discontinuo","Descripcion":"5"},
    // {"Codigo":"De_Destajo","Descripcion":"8"},
    // {"Codigo":"Obra_Cierta","Descripcion":"2"},
    // {"Codigo":"Jornada_Parcial_Permanente","Descripcion":"3"}]
    public function getTipoContrato()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TipoContrato';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    // [{"Codigo":"Renuncia_Exigida","Descripcion":"3"},
    // {"Codigo":"Reduccion_Personal","Descripcion":"2"},
    // {"Codigo":"Renuncia_Voluntaria ","Descripcion":"1"}]
    public function getTipoCese()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TipoCese';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    // [{"Codigo":"Casado","Descripcion":"2"},
    // {"Codigo":"Soltero ","Descripcion":"1"},
    // {"Codigo":"Divorciado","Descripcion":"3"},
    // {"Codigo":"Unión_Libre","Descripcion":"5"},
    // {"Codigo":"Viudo","Descripcion":"4"}]
    public function getEstadoCivil()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/EstadoCivil';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    //[{"Codigo":"No","Descripcion":"0"},{"Codigo":"Si ","Descripcion":"1"}]
    public function getEsReingreso()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/EsReingreso';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    //[{"Codigo":"Corriente","Descripcion":"2"},{"Codigo":"Ahorros ","Descripcion":"1"}]
    public function getTipoCuenta()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TipoCuenta';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function getTipoTrabajador()
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TipoTrabajador';

            $response = Http::get($url);
            return $response;
            //return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
}
