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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_image');
            $table->string('logo_footer_image');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google_plus');
            $table->string('youtube');
            $table->string('instagram');
            $table->string('copy_heading', 1000);
            $table->string('copy_text', 1000);
            $table->string('location_title', 1000);
            $table->text('location_desc');
            $table->unsignedInteger('shipping_percent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
