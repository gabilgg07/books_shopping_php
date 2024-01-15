<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeroSlider extends Model
{
    use HasFactory, HasTranslations;


    protected $guarded = [];
    protected $translatable = ['text_content'];
}