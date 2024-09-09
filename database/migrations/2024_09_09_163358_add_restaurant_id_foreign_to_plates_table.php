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
        Schema::table('plates', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id')->nullable()->after('id');

            //crea la chiave esterna
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plates', function (Blueprint $table) {

            //droppiamo la relazione tra le tabelle
            $table->dropForeign('plates_restaurant_id_foreign');
            //droppiamo il campo
            $table->dropColumn('restaurant_id');
            
        });
    }
};
