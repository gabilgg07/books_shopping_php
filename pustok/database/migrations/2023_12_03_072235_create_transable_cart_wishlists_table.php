<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transable_cart_wishlists', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('product');
            $table->string('quantity');
            $table->string('total');
            $table->string('update_cart');
            $table->string('interested_in');
            $table->string('cart_summary');
            $table->string('sub_total');
            $table->string('shipping_cost');
            $table->string('grand_total');
            $table->string('checkout');
            $table->string('wishlist');
            $table->string('remove');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transable_cart_wishlists');
    }
};
