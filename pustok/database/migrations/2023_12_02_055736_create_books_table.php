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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->double('price');
            $table->string('product_code');
            $table->unsignedInteger('count');
            $table->string('short_desc');
            $table->string('long_desc');
            $table->unsignedInteger('views');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('campaign_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};