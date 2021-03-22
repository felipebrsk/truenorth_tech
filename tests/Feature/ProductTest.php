<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_only_admins_can_see_product_route()
    {
        $response = $this->get('/product')->assertRedirect('/admin/login');
    }
}
