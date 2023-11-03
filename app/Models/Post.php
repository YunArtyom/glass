<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $with = ['comments.user'];

    protected $fillable = [
        'name',
        'content',
        'images',
        'seo_name',
        'seo_content'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
