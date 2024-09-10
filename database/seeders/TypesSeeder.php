<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;


class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Italiano',
            'description' => 'Ristoranti specializzati in cucina italiana',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Internazionale',
            'description' => 'Ristoranti con cucina internazionale',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Cinese',
            'description' => 'Ristoranti specializzati in cucina cinese',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Giapponese',
            'description' => 'Ristoranti specializzati in cucina giapponese',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Messicano',
            'description' => 'Ristoranti specializzati in cucina messicana',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Indiano',
            'description' => 'Ristoranti specializzati in cucina indiana',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Pesce',
            'description' => 'Ristoranti specializzati in piatti di pesce',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Carne',
            'description' => 'Ristoranti specializzati in piatti di carne',
            'image_path' => 'images/types/plate.jpg',
        ]);

        Type::create([
            'name' => 'Pizza',
            'description' => 'Ristoranti specializzati in pizza',
            'image_path' => 'images/types/plate.jpg',
        ]);
    }
}
