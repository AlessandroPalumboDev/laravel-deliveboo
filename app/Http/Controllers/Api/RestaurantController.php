<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    // Metodo per ottenere tutti i tipi di ristoranti
    public function getTypes() {
        $types = Type::all(); // Recupera tutti i tipi

        return response()->json([
            'success' => true,
            'types' => $types
        ]);
    }

    // Lista dei ristoranti con almeno un tipo
    public function index(Request $request) {
        // Recupera i ristoranti che hanno almeno un tipo
        $query = Restaurant::with('types')->whereHas('types');

        // Filtro per tipo se passato nel request
        if ($request->has('type')) {
            $categories = explode(',', $request->input('type'));
            $query->whereHas('types', function ($q) use ($categories) {
                $q->whereIn('name', $categories);
            });
        }

        // Paginazione dei risultati
        $restaurants = $query->paginate(6);

        // Risposta JSON
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    // Lista dei piatti di un singolo ristorante
    public function getPlatesByRestaurant($restaurantId) {
        // Trova il ristorante tramite ID e carica i piatti
        $restaurant = Restaurant::with('plate')->find($restaurantId);

        // Se il ristorante non esiste, restituisci un errore
        if (!$restaurant) {
            return response()->json([
                'success' => false,
                'message' => 'Restaurant not found',
            ], 404);
        }

        // Restituisci la lista dei piatti del ristorante
        return response()->json([
            'success' => true,
            'plates' => $restaurant->plate
        ]);
    }
}