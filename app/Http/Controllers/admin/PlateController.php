<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $userId = auth()->id();
        

        // Recupera solo i ristoranti associati a questo utente
        $restaurants = Restaurant::where('user_id', $userId)->get();
        $plates= Plate::where('restaurant_id', $userId)->get();

        return view('admin.plate.index',compact('plates','restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $plates = Plate::all();
        return view('admin.plate.create', compact('types', 'plates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlateRequest $request)
    {$data = $request->validated();

        // Recupero l' user ID
        $userId = auth()->id();
        // dd($userId);
        
        // Get the restaurant linked to the user
        $restaurant = Restaurant::where('id', $userId)->first(); 
         dd($restaurant);
    
        // Gestione immagine
        $img_path = $request->hasFile('cover_image') ? Storage::put('uploads', $data['cover_image']) : 'uploads/default.jpg';

    
        // Creo un anuova istanza di Plate
        $plate = new Plate();

        $plate->name = $data['name'];
        $plate->price = $data['price'];
        $plate->cover_image = $img_path;
        $plate->description = $data['description']; 
        $plate->ingredients = $data['ingredients'];

        $plate->is_visible = $request->boolean('is_visible');
        $plate->is_vegetarian = $request->boolean('is_vegetarian');
        $plate->is_vegan = $request->boolean('is_vegan');
        $plate->is_gluten_free = $request->boolean('is_gluten_free');
        $plate->is_lactose_free = $request->boolean('is_lactose_free');
        $plate->is_spicy = $request->boolean('is_spicy');
    
        // Associo il piatto al ristorante 
        $plate->restaurant_id = $restaurant->id;

        // Salvo il piatto
        $plate->save();
    
        // Reindirizzo
        return redirect()->route('admin.plates.index')->with('success', 'Piatto creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trova il piatto tramite l'ID
    $plate = Plate::findOrFail($id);

    // Passa il piatto alla vista per la visualizzazione
    return view('admin.plate.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Trova il piatto tramite l'ID
    $plate = Plate::findOrFail($id);
    $types = Type::all();

    // Passa il piatto alla vista per la modifica
    return view('admin.plate.edit', compact('plate', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Trova il piatto tramite l'ID
    $plate = Plate::findOrFail($id);

    // Validazione dei dati
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'ingredients' => 'required|string',
        'price' => 'required|numeric|min:0',
        'is_visible' => 'nullable|boolean',
        'is_vegetarian' => 'nullable|boolean',
        'is_vegan' => 'nullable|boolean',
        'is_gluten_free' => 'nullable|boolean',
        'is_lactose_free' => 'nullable|boolean',
        'is_spicy' => 'nullable|boolean',
        'cover_image' => 'nullable|image|max:2048',
    ]);

    // Gestione immagine
    if ($request->hasFile('cover_image')) {
        $img_path = Storage::put('uploads', $request->file('cover_image'));
        $plate->cover_image = $img_path;
    }

    // Aggiorna i campi del piatto
    $plate->update($data);

    // Salva il piatto
    $plate->save();

    // Reindirizza alla lista dei piatti
    return redirect()->route('admin.plates.index')->with('success', 'Piatto aggiornato correttamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Trova il piatto tramite l'ID
        $plate = Plate::findOrFail($id);
    
        // Elimina il piatto
        $plate->delete();
    
        // Reindirizza alla lista dei piatti
        return redirect()->route('admin.plates.index')->with('success', 'Piatto eliminato correttamente');
    }
}

            
            
          