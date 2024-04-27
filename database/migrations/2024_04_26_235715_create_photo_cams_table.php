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
        Schema::create('photo_cams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('photo_id')->constrained('photos');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('focal_length')->nullable();
            $table->string('open')->nullable();
            $table->string('iso')->nullable();
            $table->string('shutter_speed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_cams');
    }
};
