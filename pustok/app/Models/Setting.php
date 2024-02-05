<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory, HasTranslations;

    public $timestamps = false;
    protected $guarded = [];
    protected $translatable = ['copy_heading', 'copy_text', 'location_title', 'location_desc'];
}
