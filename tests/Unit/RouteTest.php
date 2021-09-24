<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_route()
    {
        $this->get('/register')->assertStatus(200);
        $this->get('/login')->assertStatus(200);
    }
}
