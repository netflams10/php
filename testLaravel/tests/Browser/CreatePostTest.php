<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class CreatePostTest extends DuskTestCase
{

    use DatabaseMigrations;
    /**
     * @group create-post
     *
     * @return void
     */
    public function testAuthUserCanCreatePost ()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/create-post')
                    ->type('title', 'New Post')
                    ->type('body', 'New Post Body')
                    ->press('Save Post')
                    ->assertPathIs('/posts')
                    ->assertSee('New Post')
                    ->assertSee('New Post Body');
        });
    }

    /**
     * @group create-post-auth
     * That User is Logged In
     */

    public function testOnlyAuthUserCanCreatePost ()
    {
        $this->withoutExceptionHandling();

        $this->browse(function (Browser $browser) {
            $browser->visit('/create-post')
                    ->assertPathIs('/login');
        });
    }
    
}
