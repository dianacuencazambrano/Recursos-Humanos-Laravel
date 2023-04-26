<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetCentrosCostosTest extends TestCase
{
    /**
     * @test
     */
    public function get_centro_costos_is_correct(): void
    {
        $this->getJson(route('api.getCentrosCostos'))->assertStatus(200);
    }
}
