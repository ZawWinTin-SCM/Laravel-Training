<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments.children')->get();
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post);
        } else {
            return 'Post not exist !';
        }
    }
}
