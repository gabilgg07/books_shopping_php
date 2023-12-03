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
        Schema::create('transable_book_details', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('transable_book_details');
    }
};
