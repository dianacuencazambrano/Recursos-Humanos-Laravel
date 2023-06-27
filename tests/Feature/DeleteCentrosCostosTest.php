<?php

namespace Tests\Feature;

use App\Http\Controllers\CentroCostosController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Tests\TestCase;

class DeleteCentrosCostosTest extends TestCase
{
    /**
     * @test
     */
    public function delete_centro_costos_is_correct(): void
    {
        $request = new Request([
            'codigocentrocostos' => '132',
            'descripcioncentrocostos' => 'centroCosto132',
        ]);

        $apiController = new CentroCostosController();

        $response = $apiController->deleteCentrosCostos($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
