<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRestaurantRequest;

use App\Models\Type;
use App\Models\Plate;
use Illuminate\Support\Facades\Storage;

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
// $data = $request->validated();







// $project = new Project();

// $project->title = $data['title'];

// $project->slug = $data['slug'];
// $project->img = $img_path;
// $project->type_id = $data['type_id'];

// $project->save();
// if ($request->has('technologies')) {
//     $project->technologies()->attach($request->technologies);
// } 


// //$project->fill($data);


// return redirect()->route('admin.Projects.index')->with('message', 'Progetto creato con successo!');