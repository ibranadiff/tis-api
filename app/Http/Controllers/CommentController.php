<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request) {
    $comment = Comment::create([
        'review' => $request->review,
        'post_id' => $request->post_id
    ]);
    return response()->json(['success' => true, 'message' => 'New comment created', 'data' => ['comment' => $comment]]);
}
}
