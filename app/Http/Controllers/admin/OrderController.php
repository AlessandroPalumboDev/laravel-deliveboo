<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;




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
    DB::beginTransaction();

    try {
        Log::info('Dati ricevuti per l\'ordine: ', $request->all());

        // Salva il nuovo ordine
        $order = new Order();
        $order->restaurant_id = $request->restaurant_id;
        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->email_address = $request->email_address;
        $order->delivery_address = $request->delivery_address;
        $order->note = $request->note;
        $order->total_price = $request->total_price;
        $order->save();

        // Popola la tabella pivot plate_order
        foreach ($request->plates as $plate) {
            $order->plates()->attach($plate['plate_id'], ['quantity' => $plate['quantity']]);
        }

        DB::commit();

        return response()->json(['success' => true, 'message' => 'Ordine salvato con successo']);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Errore nel salvataggio dell\'ordine: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Errore nel salvataggio dell\'ordine']);
    }
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


    public function statistics()
{
    $userId = auth()->id();

    // Recupera il ristorante associato a questo utente
    $restaurant = Restaurant::where('user_id', $userId)->firstOrFail();

    // Ottieni i dati degli ordini raggruppati per mese e anno
    $ordersData = Order::where('restaurant_id', $restaurant->id)
        ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count, SUM(total_price) as total_sales')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')  // Ordina prima per anno in modo crescente
        ->orderBy('month', 'asc') // Ordina poi per mese in modo crescente
        ->get();

    // Crea array di labels e valori per il grafico
    $labels = $ordersData->map(fn($order) => $order->month . '/' . $order->year)->toArray();
    $orderCounts = $ordersData->pluck('order_count')->toArray();
    $totalSales = $ordersData->pluck('total_sales')->toArray();

    // Passa i dati alla vista
    return view('admin.orders.statistics', compact('labels', 'orderCounts', 'totalSales'));
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