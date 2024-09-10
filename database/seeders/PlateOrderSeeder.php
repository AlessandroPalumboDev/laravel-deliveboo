<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Plate;
use App\Models\PlateOrder;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PlateOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        
        for($i = 0; $i < 4; $i++){
            $new_plate_order = new PlateOrder();

            $new_plate_order->order_id = 1; //Order::inRandomOrder()->first()->id;
            $new_plate_order->plate_id = 2; //Plate::inRandomOrder()->first()->id;
            $new_plate_order->quantity = 1;   

            $new_plate_order->save();
        }

        Schema::enableForeignKeyConstraints();

    }
}
