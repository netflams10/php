<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    public function show ($id)
    {
        $this->id = $id;
        $storage = Redis::Connection();

        if ($storage->zScore('articleViews', 'article:' .$id))
        {
            // $storage->zIncrBy('articleViews', 1, 'article:' . $id);
            $storage->pipeline(function ($pipe) 
            {
                // dd($pipe);
                $pipe->zINCRBY('articleViews', 1, 'article:' . $this->id);
                $pipe->INCR('article:' . $this->id . ":views");
            });
        } 
        else 
        {
            $views = $storage->incr('article:' . $this->id . ':views');
            $storage->zIncrBy('articleViews', $views, 'article:' . $this->id);
        }
        $views = $storage->get('article:' . $this->id . ':views');

        // $view = $storage->incr('article:' . $id . ':views');
        // $storage->ZINCRBY('articleViews', 1, 'article:' . $id);
        return "This is an article with id: " . $id . " it has " . $views . " views";
    }
}
