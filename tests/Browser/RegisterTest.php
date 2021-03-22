<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * @test
     */
    public function check_if_a_user_can_sign_up()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('register')
                ->type('name', 'teste2')
                ->type('email', 'teste2@teste.com.br')
                ->type('password', 'teste1234')
                ->type('password_confirmation', 'teste1234')
                ->press('Cadastrar')
                ->assertPathIs('/')
                ->assertSeeIn('.navbar', 'Meu carrinho');
        });
    }
}
