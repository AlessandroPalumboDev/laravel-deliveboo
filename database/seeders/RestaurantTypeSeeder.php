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

        for($i = 0; $i < 5; $i++){
            $new_restaurant_type = new RestaurantType();

            $new_restaurant_type->restaurant_id = 1;
            $new_restaurant_type->type_id = 3;

            $new_restaurant_type->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
