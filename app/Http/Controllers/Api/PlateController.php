<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    // Mostra i dettagli di un singolo piatto
    public function show($id) {
        // Trova il piatto tramite ID
        $plate = Plate::find($id);

        // Se il piatto non esiste, restituisci un errore
        if (!$plate) {
            return response()->json([
                'success' => false,
                'message' => 'Plate not found',
            ], 404);
        }

        // Restituisci i dettagli del piatto
        return response()->json([
            'success' => true,
            'plate' => $plate
        ]);
    }
}
