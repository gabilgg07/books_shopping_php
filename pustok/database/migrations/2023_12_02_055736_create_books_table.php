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
            $table->string('title', 1000);
            $table->string('slug', 500);
            $table->double('price');
            $table->double('rate')->default(0);
            $table->unsignedInteger('count');
            $table->string('author')->nullable();
            $table->text('short_desc');
            $table->text('long_desc');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('campaign_id')->nullable();
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
