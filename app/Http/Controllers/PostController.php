<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
    $post = Post::create(['content' => $request->content]);
    return response()->json(['success' => true, 'message' => 'New post created', 'data' => ['post' => $post]]);
}

public function getPostById($id) {
    $post = Post::find($id);
    
}

public function addTag($id, $tagId) {
    $post = Post::find($id);
    $post->tags()->attach($tagId);
    return response()->json(['success' => true, 'message' => 'Tag added to post']);
}
}
