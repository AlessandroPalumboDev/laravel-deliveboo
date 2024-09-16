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
            'image_path' => 'uploads/italiano.jpg',
        ]);

        Type::create([
            'name' => 'Pizza',
            'description' => 'Ristoranti con cucina pizza',
            'image_path' => 'uploads/pizza.jpg',
        ]);

        Type::create([
            'name' => 'Cinese',
            'description' => 'Ristoranti specializzati in cucina cinese',
            'image_path' => 'uploads/cinese.jpg',
        ]);

        Type::create([
            'name' => 'Giapponese',
            'description' => 'Ristoranti specializzati in cucina giapponese',
            'image_path' => 'uploads/giapponese.jpg',
        ]);

        Type::create([
            'name' => 'Messicano',
            'description' => 'Ristoranti specializzati in cucina messicana',
            'image_path' => 'uploads/messicano.jpg',
        ]);

        Type::create([
            'name' => 'Indiano',
            'description' => 'Ristoranti specializzati in cucina indiana',
            'image_path' => 'uploads/indiano.jpg',
        ]);

        Type::create([
            'name' => 'Sushi',
            'description' => 'Ristoranti specializzati in sushi',
            'image_path' => 'uploads/sushi.jpg',
        ]);

        Type::create([
            'name' => 'Marocchino',
            'description' => 'Ristoranti specializzati in marocchina',
            'image_path' => 'uploads/marocchino.jpg',
        ]);

        Type::create([
            'name' => 'Libanese',
            'description' => 'Ristoranti specializzati in libanese',
            'image_path' => 'uploads/libanese.jpg',
        ]);
        
        Type::create([
            'name' => 'Thailandese',
            'description' => 'Ristoranti specializzati in thailandese',
            'image_path' => 'uploads/thailandese.jpg',
        ]);

        Type::create([
            'name' => 'Hamburger',
            'description' => 'Ristoranti specializzati in hamburger',
            'image_path' => 'uploads/hamburger.jpg',
        ]);

        Type::create([
            'name' => 'Street-Food',
            'description' => 'Ristoranti specializzati in street-food',
            'image_path' => 'uploads/streetfood.jpg',
        ]);

    }
}
