<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $userId = auth()->id();

        // Recupera solo i ristoranti associati a questo utente
        $restaurant = Restaurant::where('user_id', $userId)->get();
        //trasformo la collection in array
        $restaurants = collect($restaurant)->toArray();

        //associo la prima chiave dell'array che so essere l'id
        $orders= Order::where('restaurant_id', $restaurants[0])->get();


        // $plates = Plate::where();
        
        return view('admin.orders.index', compact('restaurant', 'orders' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreorderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Usa 'with' per caricare la relazione 'plates' con i dati della tabella pivot 'quantity'
    $order = Order::with('plates')->findOrFail($id);
    
    return view('admin.orders.show', compact('order'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
