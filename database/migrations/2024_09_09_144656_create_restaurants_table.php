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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('business_name',70);
            $table->string('image_path',255);
            $table->string('address',255)->unique();
            $table->dateTime('created_at')->nullable()->default(new DateTime());
            $table->dateTime('updated_at')->nullable()->default(new DateTime());;
            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
