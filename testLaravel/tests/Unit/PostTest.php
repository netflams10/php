<?php

namespace Tests\Unit;



// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Post;

class PostTest extends TestCase
{

    use DatabaseMigrations;


    /**
     * @group formatted-date
     * return [type] [description]
     * Finding easy way to display Rather than using Long Method Everytime
     */
    public function testCanGetCreatedAtFormattedDate ()
    {
        // arrange 
        // create a post 
        $post = Post::create([
            'title' => 'Simple Title 2',
            'body' => 'Simple body for our post 2'
        ]);

        //action
        // get the value of the calling by the method
        $formattedDate = $post->createdAt();

        //assert
        // assetr that returned is as  what we expect...
        $this->assertEquals( $post->created_at->toFormattedDateString(), $formattedDate);

    }
}
