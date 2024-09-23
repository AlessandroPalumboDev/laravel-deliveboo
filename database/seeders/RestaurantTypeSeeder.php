<?php

namespace Database\Seeders;

use App\Models\RestaurantType;
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

        // Existing associations
        $existingAssociations = [
            [1, [1, 2, 3, 4]],
            [2, [4, 5, 6, 7]],
            [3, [7, 8, 9, 1]],
        ];

        foreach ($existingAssociations as [$restaurantId, $typeIds]) {
            foreach ($typeIds as $typeId) {
                RestaurantType::create([
                    'restaurant_id' => $restaurantId,
                    'type_id' => $typeId,
                ]);
            }
        }

        // New Japanese restaurants (IDs 4 to 13)
        $japaneseTypeId = 4; // Assuming Japanese cuisine type ID is 4
        $sushiTypeId = 7; // Assuming Sushi type ID is 7

        for ($restaurantId = 4; $restaurantId <= 13; $restaurantId++) {
            RestaurantType::create([
                'restaurant_id' => $restaurantId,
                'type_id' => $japaneseTypeId,
            ]);

            // Optionally add Sushi type to some restaurants
            if (in_array($restaurantId, [4, 5, 8, 11])) {
                RestaurantType::create([
                    'restaurant_id' => $restaurantId,
                    'type_id' => $sushiTypeId,
                ]);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}