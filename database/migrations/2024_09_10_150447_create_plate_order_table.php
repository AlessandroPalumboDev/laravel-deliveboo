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
        Schema::create('plate_order', function (Blueprint $table) {
            $table->id();

            // Foreign key plate
            $table->foreignId('plate_id')->constrained()->cascadeOnDelete();

            // Foreign key order
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            $table->tinyInteger('quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plate_order');
    }
};
