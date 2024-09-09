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
        Schema::table('restaurants', function (Blueprint $table) {
            //crea il campo
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            //crea la chiave esterna
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            
                //droppiamo la relazione tra le tabelle
                $table->dropForeign('restaurants_user_id_foreign');
                //droppiamo il campo
                $table->dropColumn('user_id');
            
        });
    }
};
