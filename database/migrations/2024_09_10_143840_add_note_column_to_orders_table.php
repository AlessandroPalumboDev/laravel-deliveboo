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
        Schema::table('orders', function (Blueprint $table) {
            // Aggiunge la colonna note alla tabella orders
            $table->text('note')->nullable()->after('email_address');
            $table->string('slug', 100)->after('total_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Rimuove la colonna note
            $table->dropColumn(['note', 'slug']);
        });
    }
};