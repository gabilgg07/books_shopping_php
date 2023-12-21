<?php

namespace App\Services;

use Illuminate\Support\Str;

class DataService
{
    // public function __construct(private ImageService $imageServicem, private SimpleService $simple, private ImageService $imageService)
    // {
    // }

    public function sluggable($str)
    {
        return Str::slug($str);
    }

    public function sluggableArray($array, $keyArr)
    {
        $slugs = [];
        foreach ($array[$keyArr] as $key => $value) {
            $slugs[$key] = $this->sluggable($value);
        }
        return $slugs;
    }

    public function search($model, $name, $q)
    {
        $locale = app()->getLocale();
        if ($q) {
            $categories = $model::where($name . '->' . $locale, $q)->paginate(10);
        } else {
            $categories = $model::paginate(10);
        }
        return $categories;
    }

    public $colorsArray = ['primary', 'danger', 'success', 'warning', 'info', 'pink', 'violet', 'purple', 'indigo', 'blue', 'teal', 'green', 'orange', 'brown', 'grey', 'slate',];

    // public function getObjectProps($o, $fields, $parent = '') {
    //     if (strlen($parent)) {
    //         $parent .= '->';
    //     }
    //     foreach ($fields as $k => $v) {
    //         if (is_array($v)) {
    //             $this->getObjectProps($o->{$k}, $v, $parent . $k);
    //         } else {
    //             echo $parent . $v . ' - ' . $o->{$v} . '<br/>';
    //         }
    //     }
    // }

    // protected $fields = [];
    // public function getObjectProps($o)
    // {
    //     foreach ($o as $k => $v) {
    //         $this->fields[] = $k;
    //         if (is_array($v)) {
    //             $this->fields[] = $this->getObjectProps($o->{$k});
    //         }
    //     }
    //     return  $this->fields;
    // }

    // public function getFields($arr)
    // {
    //     $attr = $this->getObjectProps($arr);
    //     $fields = array_slice($attr, 1, count($attr) - 9);
    //     return $fields;
    // }

    // public function getFields($attr)
    // {
    //     $fields = array_slice($attr, 1, count($attr) - 9);
    //     return $fields;
    // }
}
