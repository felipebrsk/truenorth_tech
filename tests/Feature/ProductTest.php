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
    public function only_admins_can_see_products_list()
    {
        $response = $this->get('/product')->assertRedirect('/admin/login');
    }
}
