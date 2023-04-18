<?php

namespace Tests\Feature;

use Tests\TestCase;

class DataTestWrongUser extends TestCase
{
    /**
     * @test
     */
    public function dataTest_With_Wrong_Username(): void
    {
        $data = ['nombreUsuario' => '5004', 'passwordUsuario' => '5004u', 'codigoEmisor' => '2'];
        $response = $this->getJson(route('api.login2', $data));
        $response->assertJsonMissing($data);
    }
}
