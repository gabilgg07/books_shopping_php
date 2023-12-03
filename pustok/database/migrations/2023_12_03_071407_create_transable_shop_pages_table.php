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
        Schema::create('transable_shop_pages', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transable_shop_pages');
    }
};
