<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * @test
     */
    public function check_if_login_function_is_working_fine()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'teste@teste.com.br')
                    ->type('password', 'teste1234')
                    ->press('Log In')
                    ->assertPathIs('/');
        });
    }
}
