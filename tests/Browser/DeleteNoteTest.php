<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * 
     * @group notesdelete
     */
    public function testExample(): void
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
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->assertSee('Notes')
                    ->clickLink('Test Note')
                    ->assertPathBeginsWith('/note/3')
                    ->assertSee('Test Note')
                    ->press('Delete');
        });
    }
}