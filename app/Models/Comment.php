<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    'review',
    'post_id'
];

public function post()
{
    return $this->belongsTo(Post::class, 'post_id');
}

}
