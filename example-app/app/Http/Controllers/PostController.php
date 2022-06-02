<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\VoteUpdated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        session(['postId' => $id]);
        return view('post.show', ['post' => $post]);
    }

    public function vote()
    {
        $id = session('postId');
        $post = Post::findOrFail($id);
        $post->no_of_votes = $post->no_of_votes + 1;
        $post->save();
        $responseValue = array(
            'message' => 'Vote Success',
            'post' => $post,
        );
        broadcast(new VoteUpdated(auth()->user(), $post))->toOthers();
        return response()->json($responseValue);
    }
}
