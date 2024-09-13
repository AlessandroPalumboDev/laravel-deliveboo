<?php

namespace Database\Seeders;

use App\Models\restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Redis\Connections\PredisClusterConnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
            DB::table('restaurants')->truncate();

            // prendo dal modello user gli id presenti

            $userIds = User::pluck('id')->toArray();
         
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

            // controllo se cono presenti utenti
            if (count($userIds) < count($restaurants)) {
                $this->command->error('Non ci sono abbastanza utenti per assegnare un ristorante a ciascuno.');
                return;
            }

            
            foreach($restaurants as $index => $rest){

            $restaurant= new restaurant();
        

            $restaurant->user_id=$userIds[$index];

            $restaurant->business_name=$rest['name'];
    
            $restaurant->image_path=$rest['image_path'];
    
            $restaurant->address=$rest['address'];

            $restaurant->slug=Str::of($restaurant->business_name)->slug('-');
    
            
            $restaurant->save();
            
            }
            Schema::enableForeignKeyConstraints();
        
    }
}
