<?php

namespace Database\Seeders;

use App\Models\restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
            DB::table('restaurants')->truncate();

            /**
             * inserimento dati 
             */
            $restaurants = [
                [
                    'name' => 'mc donald',
                    'address' => 'Via Roma, 10',
                    'image_path' => 'mcdonald.jpg',
                ],
                [
                    'name' => 'la napoli',
                    'address' => 'Via Napoli, 25',
                    'image_path' => 'lanapoli.jpg',
                ],
                [
                    'name' => 'il carbonaro',
                    'address' => 'Via Milano, 30',
                    'image_path' => 'ilcarbonaro.jpg',
                ]
            ];
            
            foreach($restaurants as $rest){
            $restaurant= new restaurant();
            
    
            $restaurant->business_name=$rest['name'];
    
            $restaurant->image_path=$rest['image_path'];
    
            $restaurant->address=$rest['address'];
    
            $restaurant->save();
            
            }
            Schema::enableForeignKeyConstraints();
        
    }
}
