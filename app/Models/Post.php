<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'cover_img'
    ];

    protected $appends = [
        'full_cover_img'
    ];

    /*
        Custom attributes
    */
    public function getFullCoverImgAttribute()
    {
        if ($this->cover_img) {
            return asset('storage/' . $this->cover_img);
        }

        return null;
    }

    /*
        Relationships
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
