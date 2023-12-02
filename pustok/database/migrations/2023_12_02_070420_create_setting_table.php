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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo_image');
            $table->string('phone');
            $table->string('arrdess');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google_plus');
            $table->string('youtube');
            $table->string('footer_title');
            $table->string('copy');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('location_title');
            $table->string('location_desc');
            $table->string('send_us');
            $table->double('shipping_percent')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
