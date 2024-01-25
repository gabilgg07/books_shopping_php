<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Book extends Model
{
    use HasFactory, HasTranslations;


    protected $guarded = [];
    protected $translatable = ['title', 'short_desc', 'long_desc', 'slug'];

    public function bookImages()
    {
        return $this->hasMany(BookImage::class, 'book_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
