<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    protected $translatable = ['title', 'slug'];

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}
