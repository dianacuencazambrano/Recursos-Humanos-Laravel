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
        //try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/TrabajadorSelect?sucursal='.$request->sucursal;
            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
            //return response()->json(['success' => 1, 'message' => $response[0]], 200);
        /* } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        } */
    }
    public function insertTrabajador(Request $request)
    {
        //try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            //$url = $apiURL . '/api/Varios/TrabajadorInsert?COMP_Codigo='.$request->COMP_Codigo.'&Tipo_trabajador='.$request->Tipo_trabajador.'&Apellido_Paterno='.$request->Apellido_Paterno.'&Apellido_Materno='.$request->Apellido_Materno.'&Nombres='.$request->Nombres.'&Identificacion='.$request->Identificacion.'&Entidad_Bancaria='.$request->Entidad_Bancaria.'&CarnetIESS='.$request->CarnetIESS.'&Direccion='.$request->Direccion.'&Telefono_Fijo='.$request->Telefono_Fijo.'&Telefono_Movil='.$request->Telefono_Movil.'&Genero='.$request->Genero.'&Nro_Cuenta_Bancaria='.$request->Nro_Cuenta_Bancaria.'&Codigo_Categoria_Ocupacion='.$request->Codigo_Categoria_Ocupacion.'&Ocupacion='.$request->Ocupacion.'&Centro_Costos='.$request->Centro_Costos.'&Nivel_Salarial='.$request->Nivel_Salarial.'&EstadoTrabajador='.$request->EstadoTrabajador.'&Tipo_Contrato='.$request->Tipo_Contrato.'&Tipo_Cese='.$request->Tipo_Cese.'&EstadoCivil='.$request->EstadoCivil.'&TipodeComision='.$request->TipodeComision.'&FechaNacimiento='.$request->FechaNacimiento.'&FechaIngreso='.$request->FechaIngreso.'&FechaCese='.$request->FechaCese.'&PeriododeVacaciones='.$request->PeriododeVacaciones.'&FechaReingreso='.$request->FechaReingreso.'&Fecha_Ult_Actualizacion='.$request->Fecha_Ult_Actualizacion.'&EsReingreso='.$request->EsReingreso.'&Tipo_Cuenta='.$request->Tipo_Cuenta.'&FormaCalculo13ro='.$request->FormaCalculo13ro.'&FormaCalculo14ro='.$request->FormaCalculo14ro.'&BoniComplementaria='.$request->BoniComplementaria.'&BoniEspecial='.$request->BoniEspecial.'&Remuneracion_Minima='.$request->Remuneracion_Minima.'&Fondo_Reserva='.$request->Fondo_Reserva.'&Mensaje='.$request->Mensaje;
            $url = $apiURL . '/api/Varios/TrabajadorInsert?COMP_Codigo='.$request->COMP_Codigo.'&Tipo_trabajador='.$request->Tipo_trabajador.'&Apellido_Paterno='.$request->Apellido_Paterno.'&Apellido_Materno='.$request->Apellido_Materno.'&Nombres='.$request->Nombres.'&Identificacion='.$request->Identificacion.'&Entidad_Bancaria='.$request->Entidad_Bancaria.'&CarnetIESS='.$request->CarnetIESS.'&Direccion='.$request->Direccion.'&Telefono_Fijo='.$request->Telefono_Fijo.'&Telefono_Movil='.$request->Telefono_Movil.'&Genero='.$request->Genero.'&Nro_Cuenta_Bancaria='.$request->Nro_Cuenta_Bancaria.'&Codigo_Categoria_Ocupacion='.$request->Codigo_Categoria_Ocupacion.'&Ocupacion='.$request->Ocupacion.'&Centro_Costos='.$request->Centro_Costos.'&Nivel_Salarial='.$request->Nivel_Salarial.'&EstadoTrabajador='.$request->EstadoTrabajador.'&Tipo_Contrato='.$request->Tipo_Contrato.'&Tipo_Cese='.$request->Tipo_Cese.'&EstadoCivil='.$request->EstadoCivil.'&TipodeComision='.$request->TipodeComision.'&FechaNacimiento='.$request->FechaNacimiento.'T00:00:00&FechaIngreso='.$request->FechaIngreso.'T00:00:00&FechaCese='.$request->FechaCese.'T00:00:00&PeriododeVacaciones='.$request->PeriododeVacaciones.'&FechaReingreso='.$request->FechaReingreso.'T00:00:00&Fecha_Ult_Actualizacion='.$request->Fecha_Ult_Actualizacion.'T00:00:00&EsReingreso='.$request->EsReingreso.'&Tipo_Cuenta='.$request->Tipo_Cuenta.'&FormaCalculo13ro='.$request->FormaCalculo13ro.'&FormaCalculo14ro='.$request->FormaCalculo14ro.'&BoniComplementaria='.$request->BoniComplementaria.'&BoniEspecial='.$request->BoniEspecial.'&Remuneracion_Minima='.$request->Remuneracion_Minima.'&Fondo_Reserva='.$request->Fondo_Reserva.'&Mensaje='.$request->Mensaje;
            //return $url;
            $response = Http::post($url);
            $response = $response->getBody();
            //return $response;
            return response()->json(['success' => 1, 'message' => $response], 200);
        /* } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        } */
    }

    public function deleteTrabajador(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL . '/api/Varios/TrabajadorDelete?sucursal='.$request->sucursal.'&codigoempleado='.$request->codigoempleado;
            
            $response = Http::get($url);
            $response = $response->getBody();
            return $response;
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }

    /**http://apiservicios.ecuasolmovsa.com:3009/api/Varios/TrabajadorUpdate?COMP_Codigo=2&Id_Trabajador=1599&Tipo_trabajador=1&Apellido_Paterno=Prubbb&Apellido_Materno=Prubcxc&Nombres=Prubxcxc&Identificacion=1720306867&Entidad_Bancaria=1&CarnetIESS=NA&Direccion=1&Telefono_Fijo=022897236&Telefono_Movil=0987621334&Genero=M&Nro_Cuenta_Bancaria=1&Codigo_Categoria_Ocupacion=1&Ocupacion=0&Centro_Costos=0&Nivel_Salarial=1&EstadoTrabajador=1&Tipo_Contrato=2&Tipo_Cese=1&EstadoCivil=1&TipodeComision=1&FechaNacimiento=2023-06-11&FechaIngreso=2023-06-11&FechaCese=2023-06-11&PeriododeVacaciones=1&FechaReingreso=2023-06-11&Fecha_Ult_Actualizacion=2023-06-11&EsReingreso=1&Tipo_Cuenta=1&FormaCalculo13ro=1&FormaCalculo14ro=1&BoniComplementaria=1&BoniEspecial=1&Remuneracion_Minima=1&Fondo_Reserva=1&Mensaje=1 */
    public function updateTrabajador(Request $request)
    {
        try {
            $apiURL = 'http://apiservicios.ecuasolmovsa.com:3009';
            $url = $apiURL.'/api/Varios/TrabajadorUpdate?COMP_Codigo='.$request->COMP_Codigo.'&Id_Trabajador='.$request->Id_Trabajador.'&Tipo_trabajador='.$request->Tipo_trabajador.'&Apellido_Paterno='.$request->Apellido_Paterno.'&Apellido_Materno='.$request->Apellido_Materno.'&Nombres='.$request->Nombres.'&Identificacion='.$request->Identificacion.'&Entidad_Bancaria='.$request->Entidad_Bancaria.'&CarnetIESS='.$request->CarnetIESS.'&Direccion='.$request->Direccion.'&Telefono_Fijo='.$request->Telefono_Fijo.'&Telefono_Movil='.$request->Telefono_Movil.'&Genero='.$request->Genero.'&Nro_Cuenta_Bancaria='.$request->Nro_Cuenta_Bancaria.'&Codigo_Categoria_Ocupacion='.$request->Codigo_Categoria_Ocupacion.'&Ocupacion='.$request->Ocupacion.'&Centro_Costos='.$request->Centro_Costos.'&Nivel_Salarial='.$request->Nivel_Salarial.'&EstadoTrabajador='.$request->EstadoTrabajador.'&Tipo_Contrato='.$request->Tipo_Contrato.'&Tipo_Cese='.$request->Tipo_Cese.'&EstadoCivil='.$request->EstadoCivil.'&TipodeComision='.$request->TipodeComision.'&FechaNacimiento='.$request->FechaNacimiento.'T00:00:00&FechaIngreso='.$request->FechaIngreso.'T00:00:00&FechaCese='.$request->FechaCese.'T00:00:00&PeriododeVacaciones='.$request->PeriododeVacaciones.'&FechaReingreso='.$request->FechaReingreso.'T00:00:00&Fecha_Ult_Actualizacion='.$request->Fecha_Ult_Actualizacion.'T00:00:00&EsReingreso='.$request->EsReingreso.'&Tipo_Cuenta='.$request->Tipo_Cuenta.'&FormaCalculo13ro='.$request->FormaCalculo13ro.'&FormaCalculo14ro='.$request->FormaCalculo14ro.'&BoniComplementaria='.$request->BoniComplementaria.'&BoniEspecial='.$request->BoniEspecial.'&Remuneracion_Minima='.$request->Remuneracion_Minima.'&Fondo_Reserva='.$request->Fondo_Reserva.'&Mensaje='.$request->Mensaje;
            //return $url;
            $response = Http::post($url);
            $response = $response->getBody();
            return response()->json(['success' => 1, 'message' => $response], 200);
        } catch (\Exception $th) {
            return response()->json(['success' => 0, 'message' => $th], 201);
        }
    }
}
