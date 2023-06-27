<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * @test
     */
    public function login_is_correct(): void
    {
        $request = new Request([
            "nombreUsuario" => 5004,
            "passwordUsuario" => "5004u",
            "codigoEmisor" => 2
        ]);

        $authController = new AuthController();
        $response = $authController->login($request);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
