<?php

namespace Tests\Feature;

use App\Http\Controllers\TrabajadorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class DeleteTrabajadorTest extends TestCase
{
    /**
     * @test
     */
    public function delete_trabajador_is_correct(): void
    {
        $request = new Request([
            'sucursal' => '2',
            'codigoempleado' => '1',
        ]);

        $apiController = new TrabajadorController();

        $response = $apiController->deleteTrabajador($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
