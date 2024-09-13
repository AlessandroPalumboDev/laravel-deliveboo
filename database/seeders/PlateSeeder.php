<?php

namespace Database\Seeders;

use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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

            // Panini McDonald
            [
                'restaurant_id' => 1,
                'name' => 'cheeseburger',
                'price' => 3,
                'cover_image' => 'cheeseburger.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'pane, hamburger di manzo, formaggio, cipolla a dadini, senape, cetriolo, ketchup,',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'chickenburger',
                'price' => 3,
                'cover_image' => 'chickenburger.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'pane, hamburger di pollo, salsa caesar',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'filet-o-fish',
                'price' => 3,
                'cover_image' => 'filet-o-fish.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'pane, merluzzo impanato, formaggio, salsa tartara',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'crispy mcbacon',
                'price' => 6,
                'cover_image' => 'crispy-mcbacon.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'pane, doppio hamburger di manzo, formaggio, bacon, salsa crispy',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'big mac',
                'price' => 5,
                'cover_image' => 'big-mac.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'pane, doppio hamburger di manzo, formaggio, cipolla a dadini, insalata, cetriolo, salsa big mac',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            [
                'restaurant_id' => 1,
                'name' => 'mcchicken',
                'price' => 4,
                'cover_image' => 'mcchicken.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'pane, petto di pollo, insalata, salsa mcchicken',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            // FINE panini McDonald

            // Pizze
            [
                'restaurant_id' => 2,
                'name' => 'marinara',
                'price' => 3,
                'cover_image' => 'marinara.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'farina 00, passata di pomodoro, aglio, origano',
                'is_visible' => true,
                'is_vegetarian' => true,
                'is_vegan' => true,
                'is_gluten_free' => false,
                'is_lactose_free' => true,
                'is_spicy' => false, 
            ],
            [
                'restaurant_id' => 2,
                'name' => 'margherita',
                'price' => 5,
                'cover_image' => 'margherita.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'farina 00, passata di pomodoro, mozzarella, basilico',
                'is_visible' => true,
                'is_vegetarian' => true,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false, 
            ],
            [
                'restaurant_id' => 2,
                'name' => 'ortolana',
                'price' => 5,
                'cover_image' => 'ortolana.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'farina 00, passata di pomodoro, mozzarella, peperoni grigliati, zucchine grigliate, melanzane grigliate, cipolle rosse',
                'is_visible' => true,
                'is_vegetarian' => true,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false, 
            ],
            [
                'restaurant_id' => 2,
                'name' => 'tonno e cipolle',
                'price' => 5,
                'cover_image' => 'tonno-cipolle.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'farina 00, passata di pomodoro, mozzarella, tonno, cipolle rosse',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false, 
            ],
            [
                'restaurant_id' => 2,
                'name' => '4 stagioni',
                'price' => 5,
                'cover_image' => '4-stagioni.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'farina 00, passata di pomodoro, mozzarella, funghi, prosciutto cotto, olive nere, carciofi',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false, 
            ],
            [
                'restaurant_id' => 2,
                'name' => '4 formaggi',
                'price' => 5,
                'cover_image' => '4-formaggi.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'farina 00, mozzarella, fontina, gorgonzola, parmigiano reggiano',
                'is_visible' => true,
                'is_vegetarian' => true,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false, 
            ],
            // FINE pizze

            // Piatti di pasta
            [
                'restaurant_id' => 3,
                'name' => 'carbonara',
                'price' => 9.50,
                'cover_image' => 'carbonara.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'mezze maniche di semola di grano duro, tuorlo d\'uovo, guanciale, pecorino romano, pepe nero',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => true,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'gricia',
                'price' => 8.50,
                'cover_image' => 'gricia.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'rigatoni di semola di grano duro, pecorino romano, guanciale, pepe nero',
                'is_visible' => false,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'amatriciana',
                'price' => 8.50,
                'cover_image' => 'amatriciana.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'bucatini di semola di grano duro, pomodoro, pecorino romano, guanciale, pepe nero, peperoncino',
                'is_visible' => false,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => true,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'cacio e pepe',
                'price' => 6,
                'cover_image' => 'cacio-e-pepe.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'spaghetti di semola di grano duro, pecorino romano, pepe nero',
                'is_visible' => true,
                'is_vegetarian' => true,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => true,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'puttanesca',
                'price' => 8.50,
                'cover_image' => 'puttanesca.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'penne di semola di grano duro, pomodoro, acciughe, capperi, olive nere, prezzemolo, peperoncino',
                'is_visible' => true,
                'is_vegetarian' => false,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => true,
                'is_spicy' => true,
            ],
            [
                'restaurant_id' => 3,
                'name' => 'norma',
                'price' => 7.50,
                'cover_image' => 'norma.jpeg',
                'description' => 'lorem ipsum',
                'ingredients' => 'sedani rigati di semola di grano duro, pomodoro, ricotta di pecora, melanzane, basilico',
                'is_visible' => true,
                'is_vegetarian' => true,
                'is_vegan' => false,
                'is_gluten_free' => false,
                'is_lactose_free' => false,
                'is_spicy' => false,
            ],
            // FINE Piatti di pasta

        ];

        foreach($plates as $restaurant_plate) {
            $plate = new Plate();


            $plate->restaurant_id = $restaurant_plate['restaurant_id'];

            $plate->name = $restaurant_plate['name'];

            $plate->price = $restaurant_plate['price'];

            $plate->cover_image = $restaurant_plate['cover_image'];

            $plate->description = $restaurant_plate['description'];

            $plate->ingredients = $restaurant_plate['ingredients'];

            $plate->is_visible = $restaurant_plate['is_visible'];

            $plate->is_vegetarian = $restaurant_plate['is_vegetarian'];

            $plate->is_vegan = $restaurant_plate['is_vegan'];

            $plate->is_gluten_free = $restaurant_plate['is_gluten_free'];

            $plate->is_lactose_free = $restaurant_plate['is_lactose_free'];

            $plate->is_spicy = $restaurant_plate['is_spicy'];

            $plate->slug=Str::of($plate->name)->slug('-');

            $plate->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
