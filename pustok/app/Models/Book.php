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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }


    public function bookImages()
    {
        return $this->hasMany(BookImage::class, 'book_id');
    }

    public function mainImage()
    {
        return $this->bookImages->where('is_main', 1)->first();
    }
    public function images()
    {
        return $this->bookImages->where('is_main', 0) ?? null;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'book_id');
    }
}
