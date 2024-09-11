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
        Schema::create('plates', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);
            $table->decimal('price', $precision = 4, $scale = 2);
            $table->string('cover_image', length: 255);
            $table->text('description')->nullable();
            $table->text('ingredients');
            $table->boolean('is_visible');
            $table->boolean('is_vegetarian');
            $table->boolean('is_vegan');
            $table->boolean('is_gluten_free');
            $table->boolean('is_lactose_free');
            $table->boolean('is_spicy');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};
