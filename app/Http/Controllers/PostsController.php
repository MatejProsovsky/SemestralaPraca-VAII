<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() {
        return view('/posts/index');
    }


    public function create() {
        return view('posts.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'text' => 'required',
            'section' => 'required',
            'shortText' => 'required',
        ]);

        $user = auth()->user();
        $name = $user->name;
        if (request('image') != '') {
            $image = request('image');
        } else {
            $image = '*';
        }
        if (request('source') != '') {
            $source = request('source');
        } else {
            $source = '*';
        }

        auth()->user()->posts()->create([
            'title' => $data['title'],
            'text' => $data['text'],
            'section'=> $data['section'],
            'username' => $name,
            'shortText'=> $data['shortText'],
            'image' => $image,
            'source' => $source,
        ]);
        return view('/posts/index');
    }


    public function show($id) {
        $res = Post::find($id);
        foreach (Post::all() as $post) {
            if ($post->id == $id) {
                $res = $post;
            }
        }
        return view('/posts/show', array('post'=>$res));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'action' => route('post.update', $post->id),
            'method' => 'put',
            'model' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post) {
        /*$res = Post::find($id);
        foreach (Post::all() as $post) {
            if ($post->id == $id) {
                $res = $post;
            }
        }*/
        $request->validate([
            'title' => 'required',
            'shortText' => 'required',
            'text' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
