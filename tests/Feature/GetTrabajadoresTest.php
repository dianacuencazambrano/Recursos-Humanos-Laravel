<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTrabajadoresTest extends TestCase
{
    /**
     * @test
     */
    public function get_trabajadores_is_correct(): void
    {
        $this->getJson(route('api.getTrabajador'))->assertStatus(200);
        
    }
}
