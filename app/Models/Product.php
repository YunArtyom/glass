<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $with = ['comments.user', 'category'];

    protected $fillable = [
        'name',
        'price',
        'desc',
        'seo_name',
        'seo_content',
        'category_id',
        'img'
    ];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
