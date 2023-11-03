<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reel extends Model
{
    use HasFactory;

    protected $table = 'reels';
    protected $with = ['comments.user'];

    protected $fillable = [
        'name',
        'content',
        'video'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
