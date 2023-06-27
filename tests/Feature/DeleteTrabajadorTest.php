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
     * A basic feature test example.
     */
    public function test_example(): void
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
