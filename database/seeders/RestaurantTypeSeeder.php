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

        // Specific associations
        $customAssociations = [
            [1, [11]],    
            [2, [1, 2]],  
            [3, [1]],    
        ];

        foreach ($customAssociations as [$restaurantId, $typeIds]) {
            foreach ($typeIds as $typeId) {
                RestaurantType::create([
                    'restaurant_id' => $restaurantId,
                    'type_id' => $typeId,
                ]);
            }
        }

        
        $japaneseTypeId = 4; 
        $sushiTypeId = 7; 

        for ($restaurantId = 4; $restaurantId <= 13; $restaurantId++) {
            RestaurantType::create([
                'restaurant_id' => $restaurantId,
                'type_id' => $japaneseTypeId,
            ]);

            RestaurantType::create([
                'restaurant_id' => $restaurantId,
                'type_id' => $sushiTypeId,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
