<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // beri middleware 'auth' untuk mengecek sudah login atau belum
    public function __construct()
    {
        $this->middleware('auth');
    }
    //daftar post
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    //menampilkan halaman create
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        // membuat data baru untuk table 'post'
        // melalui model post
        $post = new Post;
        $post->tittle =$request->tittle;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        //mencari data post berdasarkan parameter id
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        //mencari data post berdasarkan parameter id
        $post = Post::find($id);

        return view('post.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        //mencari data post berdasarkan parameter 'id'
        $post   = Post::findOrFail($id);
        $post->tittle = $request->tittle;
        $post->content = $request->content;
        $post->save();
        // di alihkan ke halaman post melalui route post.index
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('.index');
    }
 }

