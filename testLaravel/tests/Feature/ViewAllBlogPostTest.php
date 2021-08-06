<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Post;
use Faker\Factory;

class ViewAllBlogPostTest extends TestCase
{
    use DatabaseMigrations;


    /**
     * @group posts
     * @return [type] [description]
     */

    public function testCanViewAllBlogPost ()
    {
        // arrange
        $post1 = Post::factory()->create();

        $post2 = Post::factory()->create();
        // Action

        $resp = $this->get('/posts');

        // Assert
        $resp->assertStatus(200);
        $resp->assertSee($post1->title);
        $resp->assertSee($post2->title);

        // Default value is 100
        $resp->assertSee(Str::limit($post1->body));
        $resp->assertSee(Str::limit($post2->body, 100));
    }
}
