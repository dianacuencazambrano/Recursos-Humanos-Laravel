<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Tests\TestCase;

class SearchCentrosCostosTest extends TestCase
{
     /**
     * @test
     */
    public function search_centro_costos_is_correct(): void
    {
        $request = new Request([
            'descripcioncentrocostos' => 'centroCosto',
        ]);

        $apiController = new ApiController();

        $response = $apiController->searchCentrosCostos($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
