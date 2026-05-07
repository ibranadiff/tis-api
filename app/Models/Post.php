<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'content'
];
public function comments()
{
    return $this->hasMany(Comment::class, 'post_id');
}

public function tags() {
    return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
}

}

