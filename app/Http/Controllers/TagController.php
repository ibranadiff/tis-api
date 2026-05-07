<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function createTag(Request $request) {
    $tag = Tag::create(['name' => $request->name]);
    return response()->json(['success' => true, 'message' => 'New tag created', 'data' => ['tag' => $tag]]);
}
}
