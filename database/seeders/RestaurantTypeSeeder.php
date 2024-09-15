<?php

namespace Database\Seeders;

use App\Models\RestaurantType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // for($i = 0; $i < 5; $i++){
        //     $new_restaurant_type = new RestaurantType();

        //     $new_restaurant_type->restaurant_id = 1;
        //     $new_restaurant_type->type_id = 3;

        //     $new_restaurant_type->save();
        // }

        // Tipologie ristorante 1
        RestaurantType::create([
            'restaurant_id' => 1,
            'type_id' => 1,
        ]);
        RestaurantType::create([
            'restaurant_id' => 1,
            'type_id' => 2,
        ]);
        RestaurantType::create([
            'restaurant_id' => 1,
            'type_id' => 3,
        ]);
        RestaurantType::create([
            'restaurant_id' => 1,
            'type_id' => 4,
        ]);

        // Tipologie ristorante 2
        RestaurantType::create([
            'restaurant_id' => 2,
            'type_id' => 4,
        ]);
        RestaurantType::create([
            'restaurant_id' => 2,
            'type_id' => 5,
        ]);
        RestaurantType::create([
            'restaurant_id' => 2,
            'type_id' => 6,
        ]);
        RestaurantType::create([
            'restaurant_id' => 2,
            'type_id' => 7,
        ]);

        // Tipologie ristorante 3
        RestaurantType::create([
            'restaurant_id' => 3,
            'type_id' => 7,
        ]);
        RestaurantType::create([
            'restaurant_id' => 3,
            'type_id' => 8,
        ]);
        RestaurantType::create([
            'restaurant_id' => 3,
            'type_id' => 9,
        ]);
        RestaurantType::create([
            'restaurant_id' => 3,
            'type_id' => 1,
        ]);





        Schema::enableForeignKeyConstraints();
    }
}
