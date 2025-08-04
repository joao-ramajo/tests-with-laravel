<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string'
        ]);

        $post = Post::create($request->only('title', 'content'));

        return response()->json($post, 201);
    }
}
