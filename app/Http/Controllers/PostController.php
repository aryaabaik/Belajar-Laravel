<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //daftar post
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }
}
