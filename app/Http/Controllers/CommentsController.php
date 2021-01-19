<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request) {
        $comments = Comment::all();

        $grid = new Datagrid($comments, $request->get('f',[]));

        $grid
            ->setColumn('username', 'Meno')
            ->setColumn('text', 'Text')
            ->setActionColumn([
                'wrapper' => function ($value,$row) {
                    return '
                    <a href="' . route('comment.delete', $row->id) . '" title="delete" data-method="DELETE" class="btn btn-sn btn-primary" data-confirm="Ste si istý?">Zmazať</a>' ;
                }
            ]);

        return view('comment.index', [
            'grid' => $grid
        ]);
    }


    public function create() {
        return view('comment.create');
    }

    public function store(Request $request) {
        $data = request()->validate([
            'text' => 'required',
        ]);
        $user = auth()->user();

        $user->comments->create([
            'text' => $data['text'],
            'username'=>$user->name,
        ]);


        return view('/comment/index');
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
