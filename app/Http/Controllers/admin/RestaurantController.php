<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;

use App\Models\Type;
use App\Models\Plate;


class RestaurantController extends Controller
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
        $types = Type::all();
        $plates = Plate::all();
        return view('admin.restaurants.create', compact('types', 'plates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        // dd($data);

        $restaurant = new restaurant();

        $restaurant->business_name = $data['business_name'];
        $restaurant->image_path = $data['image_path'];
        $restaurant->user_id = auth()->id();;

        $restaurant->save();


        //  dopo il save perchè prima non esiste ancora l'id del post (non è salvato)
        if($request->has('types')){

            $restaurant->types()->attach($request->types);
        }
        // dd($data);

        

        return redirect()->route('admin.dashboard', $restaurant->id)->with('message', 'Il tuo ristorante:' . $restaurant->business_name . 'è stato creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
