<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'published_at',
        'author_id',
        'category_id',
        'image',
    ];

    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class);
    }
}
