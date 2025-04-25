<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * 
     * @group logout
     */
    public function testLogoutFlow(): void
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->assertSee('Enterprise Application Development')
                ->clickLink('Log in')
                ->assertPathIs('/login')
                ->type('email', 'fatih@gmail.com')
                ->type('password', 'fatih123')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->assertSee('Dashboard')
                ->assertSee('Fatih')
                ->click('@user-dropdown')
                ->pause(300)
                ->click('@logout-button');
    });
}
}