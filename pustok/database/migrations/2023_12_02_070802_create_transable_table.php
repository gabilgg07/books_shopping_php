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
        Schema::create('transable', function (Blueprint $table) {
            $table->id();
            $table->string('search_placeholder');
            $table->string('search');
            $table->string('login');
            $table->string('or');
            $table->string('register');
            $table->string('logout');
            $table->string('shopping_cart');
            $table->string('view_cart');
            $table->string('browse_categories');
            $table->string('free_support');
            $table->string('home');
            $table->string('shop');
            $table->string('contact');
            $table->string('address_text');
            $table->string('phone_text');
            $table->string('email_text');
            $table->string('information');
            $table->string('subscribe_title');
            $table->string('subscribe');
            $table->string('subscribe_placeholder');
            $table->string('stay_connected');
            $table->string('home_left_side_title');
            $table->string('showing_text');
            $table->string('all');
            $table->string('pages');
            $table->string('sort_by');
            $table->string('default_sorting');
            $table->string('name_a_z');
            $table->string('name_z_a');
            $table->string('price_low_high');
            $table->string('price_high_low');
            $table->string('rating_highest');
            $table->string('rating_lowest');
            $table->string('model_a_z');
            $table->string('model_z_a');
            $table->string('your_name');
            $table->string('your_email');
            $table->string('your_phone');
            $table->string('your_message');
            $table->string('send');
            $table->string('product_details');
            $table->string('tags');
            $table->string('price');
            $table->string('product_code');
            $table->string('availability');
            $table->string('in_stock');
            $table->string('reviews');
            $table->string('write_review');
            $table->string('qty');
            $table->string('add_to_cart');
            $table->string('add_to_wishlist');
            $table->string('description');
            $table->string('review_for');
            $table->string('add_a_review');
            $table->string('your_rating');
            $table->string('comment');
            $table->string('post_comment');
            $table->string('related_products');
            $table->string('shopping_cart');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transable');
    }
};