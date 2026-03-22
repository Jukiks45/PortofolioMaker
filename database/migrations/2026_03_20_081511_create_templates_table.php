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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();

            // CORE (dari FE)
            $table->string('title', 150);
            $table->string('slug')->unique();

            // FILE
            $table->string('file_path');   // HTML template
            $table->string('image_path')->nullable(); // preview image

            // CATEGORY
            $table->string('category_name', 50)->nullable();

            // STATUS (0 = nonaktif, 1 = aktif)
            $table->tinyInteger('status')->default(1)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
