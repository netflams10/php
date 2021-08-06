<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Post;
use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @group create-post
     * @return void
     */
    public function testCanCreatePost()
    {
        $this->withoutExceptionHandling();
        // Arrangemnet 
        $resp = $this->post('/store-posts', [
            'title' => 'new Post',
            'body' => 'new Post Body'
        ]);
        // Action
        $resp->assertStatus(200);

        //Assertion
        // $this->assertDatabaseHas('posts', [
        //     'title' => 'new Post',
        //     'body' => 'new Post Body'
        // ]);

        // Another way to assert
        $post = Post::find(1);
        $this->assertEquals('new Post', $post->title);
        $this->assertEquals('new Post Body', $post->body);
    }

    /**
     * @group title-required
     * return [types] [description]
     */
    public function testTitleIsRequiredToCreatePost()
    {
        // Arrangement
        $resp = $this->post('/store-posts', [
            'title' => null,
            'body' => 'new Post Body'
        ]);

        // Assertion
        $resp->assertSessionHasErrors('title');
    }

    /**
     * @group body-required
     * return [types] [description]
     */
    public function testBodyIsRequiredToCreatePost()
    {
        // Arrangement
        $resp = $this->post('/store-posts', [
            'title' => 'new Post',
            'body' => null
        ]);

        // Assertion
        $resp->assertSessionHasErrors('body');
    }
}
