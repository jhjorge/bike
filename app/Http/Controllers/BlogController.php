<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::limit(9)->orderby('id', 'desc')->get();
        return view('app.blog', ['posts' => $posts]);
    }
    public function post(Post $id)
    {

        return view('posts.post', ['post' => $id]);
    }
}
