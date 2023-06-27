<?php

namespace Tests\Feature;

use App\Http\Controllers\TrabajadorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class DeleteTrabajador extends TestCase
{
     /**
     * @test
     */
    public function delete_trabajador_is_correct(): void
    {
        $request = new Request([
            'sucursal' => '',
            'codigoempleado' => '',
        ]);

        $apiController = new TrabajadorController();

        $response = $apiController->deleteTrabajador($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
