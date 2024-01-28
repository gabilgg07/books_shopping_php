<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    // private static $counter = 4;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($order) {

    //         self::$counter++;

    //         $order->order_number = str_pad(self::$counter, 4, '0', STR_PAD_LEFT);
    //     });
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
