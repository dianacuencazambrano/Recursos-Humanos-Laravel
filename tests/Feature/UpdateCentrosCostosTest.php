<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Tests\TestCase;

class UpdateCentrosCostosTest extends TestCase
{
     /**
     * @test
     */
    public function update_centro_costos_is_correct(): void
    {
        $request = new Request([
            'codigocentrocostos' => '132',
            'descripcioncentrocostos' => 'centroCosto1322222',
        ]);

        $apiController = new ApiController();

        $response = $apiController->updateCentrosCostos($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
