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
        Schema::create('cart_order_transables', function (Blueprint $table) {
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
            $table->string('your_order');
            $table->string('shipping_fee');
            $table->string('place_order');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('order_notes');
            $table->string('order_notes_placeholder');
            $table->string('thank_you');
            $table->string('received_message');
            $table->string('order_number');
            $table->string('date');
            $table->string('order_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_order_transables');
    }
};
