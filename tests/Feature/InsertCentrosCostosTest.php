<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class InsertCentrosCostosTest extends TestCase
{
    /**
     * @test
     */
    public function insert_centro_costos_is_correct(): void
    {
        $request = new Request([
            'codigocentrocostos' => '132',
            'descripcioncentrocostos' => 'centroCosto132',
        ]);

        $apiController = new ApiController();

        $response = $apiController->insertCentrosCostos($request);
        $this->assertEquals(200, $response->getStatusCode());

    }
}
