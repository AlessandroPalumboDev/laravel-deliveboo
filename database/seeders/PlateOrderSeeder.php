<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Plate;
use App\Models\PlateOrder;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PlateOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('plate_order')->truncate();

        $orders = Order::all();

        foreach ($orders as $order) {
            $restaurant = Restaurant::find($order->restaurant_id);
            $plates = $restaurant->plate()->where('is_visible', true)->get();

            if ($plates->isEmpty()) {
                continue;
            }

            $orderTotal = 0;
            $plateCount = rand(1, 5); 
            for ($i = 0; $i < $plateCount; $i++) {
                $plate = $plates->random();
                $quantity = rand(1, 3);

                PlateOrder::create([
                    'order_id' => $order->id,
                    'plate_id' => $plate->id,
                    'quantity' => $quantity,
                ]);

                $orderTotal += $plate->price * $quantity;
            }

           
            $order->update(['total_price' => $orderTotal]);
        }

        Schema::enableForeignKeyConstraints();
    }
}