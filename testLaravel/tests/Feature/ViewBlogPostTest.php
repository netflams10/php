<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Post;


class ViewBlogPostTest extends TestCase
{
    /**
     * calls database migration and rolls it back...
     */
    use DatabaseMigrations;

    public function testCanViewABlogPost () {

        // Migrating Databse here with Artisan call
        // Artisan::call('migrate');

        // Arrangement step
        // creating blog post
        $post = Post::create([
            'title' => 'Simple Title',
            'body' => 'Simple body for our post'
        ]);

        //Action 
        // visiting a route

        $resp = $this->get("/post/{$post->id}");
        // Assert
        // assert status code 200

        $resp->assertStatus(200);
        // assert that we see post title

        $resp->assertSee($post->title);
        // assert that we see post body

        $resp->assertSee($post->body);
        // assert that we see publish date
        // takes it and convert it to string in a beautiful format(Carbon)
        $resp->assertSee($post->created_at->toFormattedDateString());
    }

    /**
     * @group post-not-found
     * return [type] [description]
     * user trying Id that does not exists
     */
    public function testViews404PageWhenPostIsNotFound ()
    {
        // Action
        $resp = $this->get('post/INVALID_ID');

        // Assert
        $resp->assertStatus(404);
        $resp->assertSee("The page you are looking for cannot be found");
    }
}
