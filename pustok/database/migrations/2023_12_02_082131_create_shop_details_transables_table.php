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
        Schema::create('shop_details_transables', function (Blueprint $table) {
            $table->id();
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_details_transables');
    }
};
