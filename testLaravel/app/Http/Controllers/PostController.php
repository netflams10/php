<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index ($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // return view('404');
            abort(404, "Page not found");
        }
        return view('post', compact('post'));
    }

    public function showAllPost()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    public function storePostMethod ()
    {
        $r = request();

        $this->validate($r, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $post = Post::create([
            'title' => request()->title,
            'body' => request()->body
        ]);

        return redirect('/posts');
    }

    public function createPost ()
    {
        return view('create-post');
    }
}
