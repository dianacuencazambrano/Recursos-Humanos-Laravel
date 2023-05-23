<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TrabajadorController extends Controller
{
    public function getTrabajador(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TrabajadorSelect?sucursal=' . $request->sucursal;

            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            //return response()->json(['success' => 1, 'message' => $response[0]], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
    public function insertTrabajador(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TrabajadorInsert?
            COMP_Codigo=' . $request->COMP_Codigo . '
            &Tipo_trabajador=' . $request->Tipo_trabajador . '
            &Apellido_Paterno=' . $request->Apellido_Paterno . '
            &Apellido_Materno=' . $request->Apellido_Materno . '
            &Nombres=' . $request->Nombres . '
            &Identificacion=' . $request->Identificacion . '
            &Entidad_Bancaria=' . $request->Entidad_Bancaria . '
            &CarnetIESS=' . $request->CarnetIESS . '
            &Direccion=' . $request->Direccion . '
            &Telefono_Fijo=' . $request->Telefono_Fijo . '
            &Telefono_Movil=' . $request->Telefono_Movil . '
            &Genero=' . $request->Genero . '
            &Nro_Cuenta_Bancaria=' . $request->Nro_Cuenta_Bancaria . '
            &Codigo_Categoria_Ocupacion=' . $request->Codigo_Categoria_Ocupacion . '
            &Ocupacion=' . $request->Ocupacion . '
            &Centro_Costos=' . $request->Centro_Costos . '
            &Nivel_Salarial=' . $request->Nivel_Salarial . '
            &EstadoTrabajador=' . $request->EstadoTrabajador . '
            &Tipo_Contrato=' . $request->Tipo_Contrato . '
            &Tipo_Cese=' . $request->Tipo_Cese . '
            &EstadoCivil=' . $request->EstadoCivil . '
            &TipodeComision=' . $request->TipodeComision . '
            &FechaNacimiento=' . $request->FechaNacimiento . '
            &FechaIngreso=' . $request->FechaIngreso . '
            &FechaCese=' . $request->FechaCese . '
            &PeriododeVacaciones=' . $request->PeriododeVacaciones . '
            &FechaReingreso=' . $request->FechaReingreso . '
            &Fecha_Ult_Actualizacion=' . $request->Fecha_Ult_Actualizacion. '
            &EsReingreso=' . $request->EsReingreso . '
            &BancoCTA_CTE=' . $request->BancoCTA_CTE . '
            &Tipo_Cuenta=' . $request->Tipo_Cuenta . '
            &RSV_Indem_Acumul=' . $request->RSV_Indem_Acumul . '
            &Año_Ult_Rsva_Indemni=' . $request->Año_Ult_Rsva_Indemni . '
            &Mes_Ult_Rsva_Indemni=' . $request->Mes_Ult_Rsva_Indemni . '
            &FormaCalculo13ro=' . $request->FormaCalculo13ro . '
            &FormaCalculo14ro=' . $request->FormaCalculo14ro . '
            &BoniComplementaria=' . $request->BoniComplementaria . '
            &BoniEspecial=' . $request->BoniEspecial . '
            &Remuneracion_Minima=' . $request->Remuneracion_Minima . '
            &CuotaCuentaCorriente=' . $request->CuotaCuentaCorriente . '
            &Fondo_Reserva=' . $request->Fondo_Reserva . '
            &Mensaje=' . $request->Mensaje;

            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            /* if ($response == '') {
                return response()->json(['success' => 0, 'message' => 'El Centro de Costo ya existe'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]], 200);
            } */
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function deleteTrabajador(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TrabajadorDelete?sucursal=' . $request->sucursal . '&codigoempleado=' . $request->codigoempleado;

            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            // if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Eliminación Correcta') {
            //     return response()->json(['success' => 0, 'message' => 'No se pudo eliminar'], 201);
            // } else {
            //     return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            // }
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    public function updateTrabajador(Request $request)
    {
        try {
            $apiURL = getenv('API_SERVICIOS');
            $url = $apiURL . '/api/Varios/TrabajadorUpdate?
            COMP_Codigo=' . $request->COMP_Codigo . '
            &Tipo_trabajador=' . $request->Tipo_trabajador . '
            &Apellido_Paterno=' . $request->Apellido_Paterno . '
            &Apellido_Materno=' . $request->Apellido_Materno . '
            &Nombres=' . $request->Nombres . '
            &Identificacion=' . $request->Identificacion . '
            &Entidad_Bancaria=' . $request->Entidad_Bancaria . '
            &CarnetIESS=' . $request->CarnetIESS . '
            &Direccion=' . $request->Direccion . '
            &Telefono_Fijo=' . $request->Telefono_Fijo . '
            &Telefono_Movil=' . $request->Telefono_Movil . '
            &Genero=' . $request->Genero . '
            &Nro_Cuenta_Bancaria=' . $request->Nro_Cuenta_Bancaria . '
            &Codigo_Categoria_Ocupacion=' . $request->Codigo_Categoria_Ocupacion . '
            &Ocupacion=' . $request->Ocupacion . '
            &Centro_Costos=' . $request->Centro_Costos . '
            &Nivel_Salarial=' . $request->Nivel_Salarial . '
            &EstadoTrabajador=' . $request->EstadoTrabajador . '
            &Tipo_Contrato=' . $request->Tipo_Contrato . '
            &Tipo_Cese=' . $request->Tipo_Cese . '
            &EstadoCivil=' . $request->EstadoCivil . '
            &TipodeComision=' . $request->TipodeComision . '
            &FechaNacimiento=' . $request->FechaNacimiento . '
            &FechaIngreso=' . $request->FechaIngreso . '
            &FechaCese=' . $request->FechaCese . '
            &PeriododeVacaciones=' . $request->PeriododeVacaciones . '
            &FechaReingreso=' . $request->FechaReingreso . '
            &Fecha_Ult_Actualizacion=' . $request->Fecha_Ult_Actualizacion. '
            &EsReingreso=' . $request->EsReingreso . '
            &BancoCTA_CTE=' . $request->BancoCTA_CTE . '
            &Tipo_Cuenta=' . $request->Tipo_Cuenta . '
            &RSV_Indem_Acumul=' . $request->RSV_Indem_Acumul . '
            &Año_Ult_Rsva_Indemni=' . $request->Año_Ult_Rsva_Indemni . '
            &Mes_Ult_Rsva_Indemni=' . $request->Mes_Ult_Rsva_Indemni . '
            &FormaCalculo13ro=' . $request->FormaCalculo13ro . '
            &FormaCalculo14ro=' . $request->FormaCalculo14ro . '
            &BoniComplementaria=' . $request->BoniComplementaria . '
            &BoniEspecial=' . $request->BoniEspecial . '
            &Remuneracion_Minima=' . $request->Remuneracion_Minima . '
            &CuotaCuentaCorriente=' . $request->CuotaCuentaCorriente . '
            &Fondo_Reserva=' . $request->Fondo_Reserva . '
            &Mensaje=' . $request->Mensaje;

            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            /* if ($response[0]['Codigo'] != null && $response[0]['NombreCentroCostos'] != 'Actualizacíón Correcta') {
                return response()->json(['success' => 0, 'message' => 'No se pudo actualizar'], 201);
            } else {
                return response()->json(['success' => 1, 'message' => $response[0]['NombreCentroCostos']], 200);
            } */
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
}
