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


            // ordine 1 
            PlateOrder::create([
            'order_id' => 1, 
            'plate_id' => 1, 
            'quantity' => 2,
            ]);

            PlateOrder::create([
            'order_id' => 1, 
            'plate_id' => 2, 
            'quantity' => 4,
            ]);

            PlateOrder::create([
            'order_id' => 1, 
            'plate_id' => 3, 
            'quantity' => 8,
            ]);


            // ordine 2
            PlateOrder::create([
            'order_id' => 2, 
            'plate_id' => 1, 
            'quantity' => 2,
            ]);

            PlateOrder::create([
            'order_id' => 2, 
            'plate_id' => 2, 
            'quantity' => 4,
            ]);

            PlateOrder::create([
            'order_id' => 2, 
            'plate_id' => 3, 
            'quantity' => 8,
            ]);


            // ordine 3
            PlateOrder::create([
            'order_id' => 3, 
            'plate_id' => 1, 
            'quantity' => 2,
            ]);

            PlateOrder::create([
            'order_id' => 3, 
            'plate_id' => 2, 
            'quantity' => 4,
            ]);

            PlateOrder::create([
            'order_id' => 3, 
            'plate_id' => 3, 
            'quantity' => 8,
            ]);


            // ordine 4
            PlateOrder::create([
            'order_id' => 4, 
            'plate_id' => 1, 
            'quantity' => 2,
            ]);

            PlateOrder::create([
            'order_id' => 4, 
            'plate_id' => 2, 
            'quantity' => 4,
            ]);

            PlateOrder::create([
            'order_id' => 4, 
            'plate_id' => 3, 
            'quantity' => 8,
            ]);


        Schema::enableForeignKeyConstraints();

    }
}
