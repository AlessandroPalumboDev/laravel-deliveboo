<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Braintree\Gateway;

class OrderController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key')
        ]);
    }

    public function index()
    {
        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)->get();
        $restaurants = collect($restaurant)->toArray();
        $orders = Order::where('restaurant_id', $restaurants[0])->get();
        
        return view('admin.orders.index', compact('restaurant', 'orders'));
    }

    public function create()
    {
        //
    }

    public function getToken()
    {
        return response()->json([
            'clientToken' => $this->gateway->clientToken()->generate()
        ]);
    }

    public function store(StoreorderRequest $request)
    {
        $restaurant = Restaurant::where('user_id', auth()->id())->firstOrFail();

        // Processo il pagamento con Braintree
        $result = $this->gateway->transaction()->sale([
            'amount' => $request->total_price,
            'paymentMethodNonce' => $request->paymentMethodNonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $order = Order::create([
                'restaurant_id' => $restaurant->id,
                'total_price' => $request->total_price,
                'delivery_address' => $request->delivery_address,
                'name' => $request->name,
                'surname' => $request->surname,
                'email_address' => $request->email_address,
                'order_status' => 'in preparazione',
                'delivery_time' => now()->addHour(),
                'note' => $request->note,
                'slug' => Str::slug($request->name . ' ' . $request->surname . ' ' . now()->timestamp)
            ]);

            foreach ($request->plates as $plate) {
                $order->plates()->attach($plate['plate_id'], ['quantity' => $plate['quantity']]);
            }

            return response()->json(['success' => true, 'message' => 'Ordine creato con successo'], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'Pagamento fallito: ' . $result->message], 400);
        }
    }

    public function show($id)
    {
        $order = Order::with('plates')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function statistics()
    {
        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)->firstOrFail();

        $ordersData = Order::where('restaurant_id', $restaurant->id)
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count, SUM(total_price) as total_sales')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $labels = $ordersData->map(fn($order) => $order->month . '/' . $order->year)->toArray();
        $orderCounts = $ordersData->pluck('order_count')->toArray();
        $totalSales = $ordersData->pluck('total_sales')->toArray();

        return view('admin.orders.statistics', compact('labels', 'orderCounts', 'totalSales'));
    }

    public function edit(order $order)
    {
        //
    }

    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    public function destroy(order $order)
    {
        //
    }
}