<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Book extends Model
{
    use HasFactory, HasTranslations;


    protected $guarded = [];
    protected $translatable = ['title', 'short_desc', 'long_desc'];
}