<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdaterestaurantsRequest;
use App\Models\Type;
use App\Models\Plate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        

        // Recupera solo i ristoranti associati a questo utente
        $restaurants = Restaurant::where('user_id', $userId)->get();
        $users = User::where('id', $userId)->get();

        // Passa i ristoranti alla vista
        return view('admin.Restaurants.index', compact("restaurants","users"));
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
        

        //gestione immagine
        $img_path = $request->hasFile('image_path') ? Storage::put('uploads', $data['image_path']) : 'uploads/default.jpg';


        $restaurant = new Restaurant();
        $restaurant->business_name = $data['business_name'];
        $restaurant->address=$data['address'];
        $restaurant->image_path = $img_path;
        $restaurant->user_id = auth()->id(); 
        // Salva il ristorante prima di eseguire il metodo attach
        
        $restaurant->save();
        // Dopo aver salvato, puoi associare i tipi
        if($request->has('types')){
            $restaurant->types()->attach($request->types);
        }
        

        

        return redirect()->route('admin.restaurants.index', $restaurant->id)->with('message', 'Il tuo ristorante:' . $restaurant->business_name . 'è stato creato correttamente');
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
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $types = Type::all();
    
        return view('admin.restaurants.edit',compact('restaurant','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterestaurantsRequest $request, $id) {
        // Trova il ristorante esistente tramite l'ID
        $restaurant = Restaurant::findOrFail($id);

        $data = $request->all();

        $restaurant->business_name = $data['business_name'];
        $restaurant->address = $data['address'];
    
        // Gestisci il caricamento dell'immagine se presente
        if ($request->hasFile('image_path')) {
            $img_path = $request->file('image_path')->store('uploads', 'public');
            $restaurant->image_path = $img_path;
        }
    
        // Associa i tipi di ristorante (se presenti)
        if ($request->has('types')) {
            $restaurant->types()->sync($request->types);
        }
    
        // Salva le modifiche
        $restaurant->save();
        
        
    
   
    return redirect()->route('admin.Restaurants.index')->with('message'.' - Ristorante aggiornato correttamente');;
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $restaurant->delete();

        return redirect()->route('admin.Restaurants.index');
    }
}







