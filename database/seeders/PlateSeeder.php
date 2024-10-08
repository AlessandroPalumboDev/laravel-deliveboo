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
                'cover_image' => 'uploads/cheeseburger.png',
                'description' => 'Ci sono due tipi di persone: chi ama il cheeseburger e chi ama il cheeseburger. Carne 100% bovina da allevamenti italiani, cipolla a dadini, ketchup, senape e formaggio per un gusto semplice e irresistibile.',
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
                'cover_image' => 'uploads/chickenburger.png',
                'description' => 'A un prezzo così conveniente è davvero difficile rinunciare a tutta la bontà del Chickenburger. Lasciati tentare dal suo pollo croccante 100% italiano e dalla gustosissima salsa Caesar.',
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
                'cover_image' => 'uploads/filet-o-fish.png',
                'description' => 'A volte per sorprendere bastano tre semplici ingredienti: merluzzo impanato, formaggio, salsa tartara. Il risultato? Un Grande Classico che unisce il sapore del mare al gusto unico di McDonald’s.',
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
                'cover_image' => 'uploads/crispymcbacon.png',
                'description' => "Carne 100% bovina da allevamenti italiani, croccante bacon 100% da pancetta italiana e formaggio, accompagnati dall' inconfondibile salsa Crispy. Non serve altro per incoronare Crispy McBacon® re della croccantezza e del gusto. Un Grande Classico che non tramonterà mai.",
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
                'cover_image' => 'uploads/bigmac.png',
                'description' => 'Se pensi di conoscerlo alla perfezione è perché non l’hai ancora provato. Il Grande Classico di McDonald’s è pronto a stupirti con il suo gusto ancora più irresistibile. Lasciati avvolgere dal pane più caldo, trasportare dal sapore della sua carne più succosa e goditi un’ulteriore aggiunta della sua inconfondibile salsa: lo scoprirai ancora più buono.',
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
                'cover_image' => 'uploads/mcchicken.png',
                'description' => 'Tutta la semplicità del petto di pollo avvolto in una panatura croccante, insieme all’insalata iceberg e all’inconfondibile salsa McChicken.',
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
                'cover_image' => 'uploads/marinara.jpeg',
                'description' => "Una pizza semplice e rustica, preparata con salsa di pomodoro, aglio, origano e un filo d'olio extravergine d'oliva. Perfetta per gli amanti dei sapori genuini e tradizionali, senza l'uso di formaggio.",
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
                'cover_image' => 'uploads/margherita.jpeg',
                'description' => "Un classico intramontabile della cucina italiana, con salsa di pomodoro, mozzarella fresca, foglie di basilico e un tocco di olio extravergine d'oliva. Equilibrata e deliziosa, rappresenta la pizza per eccellenza.",
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
                'cover_image' => 'uploads/ortolana.jpeg',
                'description' => 'Una pizza ricca di verdure fresche di stagione, come zucchine, melanzane, peperoni e carciofi, accompagnate da mozzarella e salsa di pomodoro. Leggera ma gustosa, ideale per chi ama i sapori vegetariani.',
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
                'cover_image' => 'uploads/tonnoecipolle.jpeg',
                'description' => 'Una combinazione saporita di tonno e cipolla rossa, su una base di mozzarella e pomodoro. Il gusto intenso del tonno si sposa alla perfezione con la dolcezza della cipolla.',
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
                'cover_image' => 'uploads/stagioni.jpeg',
                'description' => "Una pizza variegata e ricca di ingredienti, divisa in quattro sezioni per rappresentare le stagioni: prosciutto cotto, funghi, carciofi e olive nere. Un'esperienza di sapori diversi in un'unica pizza.",
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
                'cover_image' => 'uploads/formaggi.jpeg',
                'description' => "Un'esplosione di gusto per gli amanti del formaggio! Questa pizza unisce quattro tipi di formaggi filanti, come mozzarella, gorgonzola, parmigiano e fontina, creando un sapore ricco e cremoso.",
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
                'cover_image' => 'uploads/plate.jpg',
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
                'cover_image' => 'uploads/plate.jpg',
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
                'cover_image' => 'uploads/plate.jpg',
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
                'cover_image' => 'uploads/plate.jpg',
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
                'cover_image' => 'uploads/plate.jpg',
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
                'cover_image' => 'uploads/plate.jpg',
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
