<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(Request $request, Post $posts)
    {
        if ($request->has('cari')) {
            $posts = \App\Post::where('title', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $posts = \App\Post::all();
        }
        return view('posts.index',compact(['posts']));
        // $posts = Post::all();
        // return view('posts.index',compact(['posts']));
    }

    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);

        return redirect()->route('posts.index');
    }

    public function delete(Post $post)
    {
        // dd($post->all);
        $post->delete($post);
        return redirect('/posts')->with('sukses', 'Data Berhasil Dihapus');
    }
}
