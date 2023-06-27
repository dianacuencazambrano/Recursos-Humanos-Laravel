<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class InsertTrabajador extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function insert_trabajador_is_correct(): void
    {
        $request = new Request([
            'COMP_Codigo' => '2',
            'Tipo_trabajador' => 'Docente',
            'Apellido_Paterno' => 'AnaTest',
            'Apellido_Materno' => 'EstelaTest',
            'Nombres' => 'EstellaaaaTest',
            'Identificacion' => '1102853775',
            'Entidad_Bancaria' => 'Banco de Test',
            'CarnetIESS' => 'NA',
            'Direccion' => 'Los Cipres. Cabo Luis Test',
            'Telefono_Fijo' => '072570511',
            'Telefono_Movil' => '0986320510',
            'Genero' => 'Femenino',
            'Nro_Cuenta_Bancaria' => '2902231511',
            'Codigo_Categoria_Ocupacion' => '6',
            'Ocupacion' => '2',
            'Centro_Costos' => '0-Hola mundo',
            'Nivel_Salarial' => '3',
            'EstadoTrabajador' => 'Cesado',
            'Tipo_Contrato' => 'Indefinido',
            'Tipo_Cese' => 'Reduccion_Personal',
            'EstadoCivil' => 'Viudo',
            'TipodeComision' => '2',
            'FechaNacimiento' => '19/12/1978',
            'FechaIngreso' => '21/09/2017',
            'FechaCese' => '01/01/1900',
            'PeriododeVacaciones' => '0',
            'FechaReingreso' => '01/01/1900',
            'Fecha_Ult_Actualizacion' => '01/01/1900',
            'EsReingreso' => 'Si',
            'Tipo_Cuenta' => 'Ahorros',
            'FormaCalculo13ro' => '1',
            'FormaCalculo14ro' => '1',
            'BoniComplementaria' => '0',
            'BoniEspecial' => '0',
            'Remuneracion_Minima' => '450',
            'Fondo_Reserva' => 'M',
            'Mensaje' => '',
        ]);

        $apiController = new ApiController();

        $response = $apiController->insertCentrosCostos($request);
        $this->assertEquals(200, $response->getStatusCode());

    }
}
