<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function storeOrderData(Request $request)
{
    // Validazione dei dati
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email_address' => 'required|email',
        'delivery_address' => 'required|string',
        'total_price' => 'required|numeric',
        'plates' => 'required|array',
        'plates.*.plate_id' => 'required|integer',
        'plates.*.quantity' => 'required|integer',
    ]);

    // Creare l'ordine
    $order = Order::create([
        'name' => $validatedData['name'],
        'surname' => $validatedData['surname'],
        'email_address' => $validatedData['email_address'],
        'delivery_address' => $validatedData['delivery_address'],
        'total_price' => $validatedData['total_price'],
    ]);

    // Aggiungi i piatti con la quantità alla tabella pivot
    foreach ($validatedData['plates'] as $plate) {
        $order->plates()->attach($plate['plate_id'], ['quantity' => $plate['quantity']]);
    }

    return response()->json(['success' => true, 'message' => 'Ordine salvato con successo.']);
}

}
