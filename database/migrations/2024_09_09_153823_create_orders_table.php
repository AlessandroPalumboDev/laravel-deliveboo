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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            //FK del ristorante
            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();
            //prezzo totale dell'ordine
            $table->decimal('total_price', 5,2);
            //indirizzo di consegna
            $table->string('delivery_address', 50);
            //nome cliente
            $table->string('name', 50);
            //cognome cliente
            $table->string('surname', 50);
            //indirizzo email cliente
            $table->string('email_address', 50);
            //stato dell'ordine (es: in preparazione/consegnato/in ritardo)
            $table->string('order_status', 30)->default('In preparazione');
            //richiesta orario di consegna
            $table->dateTime('delivery_time')->default(now());


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
