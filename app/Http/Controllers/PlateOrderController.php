<?php

namespace App\Http\Controllers;

use App\Models\PlateOrder;
use App\Http\Requests\StorePlateOrderRequest;
use App\Http\Requests\UpdatePlateOrderRequest;

class PlateOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $new_plate_order->order_id = 1; 
        // $new_plate_order->plate_id = 2; 
        // $new_plate_order->quantity = 3;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlateOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlateOrder $plateOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlateOrder $plateOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlateOrderRequest $request, PlateOrder $plateOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlateOrder $plateOrder)
    {
        //
    }
}
