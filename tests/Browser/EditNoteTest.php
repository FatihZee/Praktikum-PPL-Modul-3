<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * 
     * @group edit-note
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
                    ->assertSee('Edit')
                    ->clickLink('Edit')
                    ->assertPathBeginsWith('/edit-note-page/3')
                    ->waitForInput('title')
                    
                    ->type('title', 'Updated Test Note')
                    ->screenshot('edit-note-page')
                    // ->assertSee('Edit Note')
                    ->type('description', 'This is an updated test note.')
                    ->press('UPDATE');
        });
    }
}