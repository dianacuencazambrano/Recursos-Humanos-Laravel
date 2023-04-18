<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class DataTest extends TestCase
{
    /**
     * @test
     */
    public function dataTest(): void
    {
        $this->getJson(route('api.login', ['nombreUsuario' => '5004', 'passwordUsuario' => '5004u', 'codigoEmisor' => '2']))->assertStatus(200);
    }
}
