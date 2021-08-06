<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Post;

class LoginTest extends DuskTestCase
{

    use DatabaseMigrations;
    /**
     * LoginDuskTest for Authentication
     * @group login
     * @return void
     */
    public function testAUserCanLogin ()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }


    /**
     * @group post-page
     * return [type] [description]
     */
    public function testAUserCanViewAPost()
    {
        $this->withoutExceptionHandling();

        $post = Post::factory()->create();

        $this->browse(function (Browser $browser) use ($post) {
            $browser->visit('/posts')
                    ->clickLink('View Post Details')
                    ->assertPathIs("/post/{$post->id}")
                    ->assertSee($post->title)
                    ->assertSee($post->body)
                    ->assertSee($post->createdAt());
        });
    }
    
}
