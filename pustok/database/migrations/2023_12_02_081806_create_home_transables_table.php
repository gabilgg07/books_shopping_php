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
        Schema::create('home_transables', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_transables');
    }
};
