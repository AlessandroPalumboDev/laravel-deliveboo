<?php

namespace App\Http\Controllers;
use App\Models\restaurant;
use App\Models\User;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // return view("dashboard");
        $userId = auth()->id();
        

        // Recupera solo i ristoranti associati a questo utente
        $restaurants = Restaurant::where('user_id', $userId)->get();
        $users = User::where('id', $userId)->get();

        // Passa i ristoranti alla vista
        return view('dashboard', compact("restaurants","users"));
        }
}
