<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise Application Development')
                    ->clickLink('Register')
                    ->assertPathIs('/register')
                    ->type('name', 'Fatih')
                    ->type('email', 'fatih@gmail.com')
                    ->type('password', 'fatih123')
                    ->type('password_confirmation', 'fatih123')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard');
        });
    }
}