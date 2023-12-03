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
        Schema::create('transable_checkout_orders', function (Blueprint $table) {
            $table->id();
            $table->string('checkout');
            $table->string('billing_address');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('country');
            $table->string('email_address');
            $table->string('phone_number');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('order_notes');
            $table->string('order_notes_placeholder');
            $table->string('your_order');
            $table->string('product');
            $table->string('total');
            $table->string('subtotal');
            $table->string('shipping_fee');
            $table->string('grand_total');
            $table->string('place_order');
            $table->string('order_complete');
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
        Schema::dropIfExists('transable_checkout_orders');
    }
};
