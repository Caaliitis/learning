<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->input('title'),$request->input('body'),$request->user());
        return redirect(route('post.get.view',['post' => $post->post_id]))->with('success','Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(Post $post, PostStoreRequest $request)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect(route('post.get.view',['post' => $post]))->with('success','Post created successfully!');
    }

    public function destroy(Post $post,Request $request)
    {
        if ($request->user()->id !== $post->user_id) {
            return redirect(route('post.list'))->with('error','Post does not exist !');
        }

        $post->delete();
        return redirect(route('post.list'))->with('success','Post has been deleted !');
    }
}
