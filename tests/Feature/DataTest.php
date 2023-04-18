<?php

namespace Tests\Feature;

use Tests\TestCase;

class DataTest extends TestCase
{
    /**
     * @test
     */
    public function data_is_correct(): void
    {
        $this->getJson(route('api.login', ['nombreUsuario' => '5004', 'passwordUsuario' => '5004u', 'codigoEmisor' => '2']))->assertStatus(200);
    }
}
