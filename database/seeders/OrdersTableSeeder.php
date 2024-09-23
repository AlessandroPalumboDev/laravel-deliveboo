<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disabilita i vincoli delle chiavi esterne prima di svuotare la tabella
        Schema::disableForeignKeyConstraints();

        // Svuota la tabella orders
        DB::table('orders')->truncate();

        // Dati di esempio per la tabella orders
        $orders = [
            [
                'restaurant_id' => 1,
                'total_price' => 89.99,
                'delivery_address' => 'Via Roma, 1',
                'name' => 'Alessandro',
                'surname' => 'Palumbo',
                'email_address' => 'alessandro.palumbo@example.com',
                'order_status' => 'In preparazione',
                'delivery_time' => now()->addHours(2),
                'note' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 1,
                'total_price' => 29.99,
                'delivery_address' => 'Via Roma, 1',
                'name' => 'Mario',
                'surname' => 'Rossi',
                'email_address' => 'mario.rossi@example.com',
                'order_status' => 'In preparazione',
                'delivery_time' => now()->addHours(2),
                'note' => 'Nessuna nota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 2,
                'total_price' => 45.50,
                'delivery_address' => 'Via Milano, 22',
                'name' => 'Luca',
                'surname' => 'Bianchi',
                'email_address' => 'luca.bianchi@example.com',
                'order_status' => 'Consegnato',
                'delivery_time' => now()->subDays(1),
                'note' => 'Consegna senza contatto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 3,
                'total_price' => 15.00,
                'delivery_address' => 'Via Napoli, 10',
                'name' => 'Giulia',
                'surname' => 'Verdi',
                'email_address' => 'giulia.verdi@example.com',
                'order_status' => 'In ritardo',
                'delivery_time' => now()->addHours(1),
                'note' => 'Chiamare al citofono',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Inserisce i dati di esempio nella tabella orders
        foreach ($orders as $orderData) {
            $order = new Order();
            $order->restaurant_id = $orderData['restaurant_id'];
            $order->total_price = $orderData['total_price'];
            $order->delivery_address = $orderData['delivery_address'];
            $order->name = $orderData['name'];
            $order->surname = $orderData['surname'];
            $order->email_address = $orderData['email_address'];
            $order->order_status = $orderData['order_status'];
            $order->delivery_time = $orderData['delivery_time'];
            $order->note = $orderData['note'];
            $order->created_at = $orderData['created_at'];
            $order->updated_at = $orderData['updated_at'];

            $order->save();
        }

        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();
    }
}
