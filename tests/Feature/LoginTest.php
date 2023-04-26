<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Tests\TestCase;

class LoginTest extends TestCase
{
     /**
     * @test
     */
    public function login__is_correct(): void
    {
        $request = new Request([
            "nombreUsuario" => 5004,
            "passwordUsuario" => "5004u",
            "codigoEmisor" => 2
        ]);

        $apiController = new ApiController();

        $response = $apiController->login($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
