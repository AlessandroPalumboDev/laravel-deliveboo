<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
            DB::table('plates')->truncate();

        $plates = [
            [
                'name' => 'Carbonara',
                'price' => 10.5,
                'cover_image' => 'carbonara.jpeg',
                'description' => 'Lorem ipsum',
                'ingredients' => 'Pasta di semola di grano duro, tuorlo d\'uovo, guanciale, pecorino romano, pepe nero',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => true,
            ],
            [
                'name' => 'Pizza Margherita',
                'price' => 5,
                'cover_image' => 'pizza-margherita.jpeg',
                'description' => 'Lorem ipsum',
                'ingredients' => 'Farina 00, passata di pomodoro, mozzarella, basilico',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false, 
            ],
            [
                 'name' => 'Ramen di verdure',
                 'price' => 11,
                 'cover_image' => 'ramen-verdure.jpeg',
                 'description' => 'Lorem ipsum',
                 'ingredients' => 'Noodles, brodo vegetale, alga kombu, alga nori, mirin, katsuobushi, cipollotto rosso, uovo marinato',
                 'is_visible' => true,
                 'is_vegetarian' => true,
                 'is_vegan' => true,
                 'is_gluten_free' => false,
                 'is_lactose_free' => true,
                 'is_spicy' => true, 
             ],
             [
                 'name' => 'Pollo Tandoori',
                 'price' => 12,
                 'cover_image' => 'pollo-tandoori.jpeg',
                 'description' => 'Lorem ipsum',
                 'ingredients' => 'Pollo, pasta tandoori, curry, yogurt bianco naturale, pasta di aglio e zenzero, succo di limone',
                 'is_visible' => true,
                 'is_vegetarian' => false,
                 'is_vegan' => false,
                 'is_gluten_free' => true,
                 'is_lactose_free' => false,
                 'is_spicy' => true, 
             ],
             [
                 'name' => 'Pita Gyros',
                 'price' => 6.5,
                 'cover_image' => 'pita-gyros.jpeg',
                 'description' => 'Lorem ipsum',
                 'ingredients' => 'Pita, lonza di maiale, lattuga iceberg, cipolla bianca, pomodori ramati,salsa tzatziki, patatine fritte',
                 'is_visible' => true,
                 'is_vegetarian' => false,
                 'is_vegan' => false,
                 'is_gluten_free' => false,
                 'is_lactose_free' => false,
                 'is_spicy' => false, 
             ],
             [
                 'name' => 'Carbonara',
                 'price' => 10.5,
                 'cover_image' => 'carbonara.jpeg',
                 'description' => 'Lorem ipsum',
                 'ingredients' => 'Pasta di semola di grano duro, tuorlo d\'uovo, guanciale, pecorino romano, pepe nero',
                 'is_visible' => true,
                 'is_vegetarian' => false,
                 'is_vegan' => false,
                 'is_gluten_free' => false,
                 'is_lactose_free' => false,
                 'is_spicy' => true, 
             ],
        ];
    }
}
