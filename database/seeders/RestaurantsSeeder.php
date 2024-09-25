<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
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

        $restaurants = [
            ['name' => "mc donald's", 'address' => 'Via Roma, 10', 'image_path' => 'uploads/mcdonalds.jpeg'],
            ['name' => 'la napoli', 'address' => 'Via Napoli, 25', 'image_path' => 'uploads/restaurant.jpeg'],
            ['name' => 'il carbonaro', 'address' => 'Via Milano, 30', 'image_path' => 'uploads/restaurant.jpeg'],
            ['name' => 'Sakura Sushi', 'address' => 'Via Tokyo, 1', 'image_path' => 'uploads/giappo1.jpeg'],
            ['name' => 'Ramen House', 'address' => 'Corso Osaka, 15', 'image_path' => 'uploads/giappo2.jpeg'],
            ['name' => 'Teppanyaki Grill', 'address' => 'Piazza Kyoto, 7', 'image_path' => 'uploads/giappo3.jpeg'],
            ['name' => 'Izakaya Nights', 'address' => 'Via Sapporo, 22', 'image_path' => 'uploads/giappo4.jpeg'],
            ['name' => 'Matcha Cafe', 'address' => 'Viale Nara, 5', 'image_path' => 'uploads/giappo5.jpeg'],
            ['name' => 'Tempura Heaven', 'address' => 'Via Yokohama, 18', 'image_path' => 'uploads/giappo6.jpeg'],
            ['name' => 'Udon Noodle Bar', 'address' => 'Corso Nagoya, 33', 'image_path' => 'uploads/giappo7.jpeg'],
            ['name' => 'Bento Box Express', 'address' => 'Piazza Fukuoka, 9', 'image_path' => 'uploads/giappo8.jpeg'],
            ['name' => 'Yakitori Grille', 'address' => 'Via Kobe, 27', 'image_path' => 'uploads/giappo9.jpeg'],
            ['name' => 'Soba Noodle House', 'address' => 'Viale Hiroshima, 11', 'image_path' => 'uploads/giappo10.jpeg'],
        ];

        $users = User::all();

        foreach($restaurants as $index => $rest){
            if (isset($users[$index])) {
                $restaurant = new Restaurant();
                $restaurant->user_id = $users[$index]->id;
                $restaurant->business_name = $rest['name'];
                $restaurant->image_path = $rest['image_path'];
                $restaurant->address = $rest['address'];
                $restaurant->slug = Str::of($restaurant->business_name)->slug('-');
                $restaurant->save();
            } else {
                $this->command->error("Non c'è un utente disponibile per il ristorante: " . $rest['name']);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}