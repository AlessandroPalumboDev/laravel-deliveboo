<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\PlateController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\BraintreeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rotta per ottenere i dettagli dell'utente autenticato (protetta con Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotta per la lista dei ristoranti con almeno un tipo
Route::get('restaurants', [RestaurantController::class, 'index']);

// Rotta per ottenere la lista dei piatti di un singolo ristorante
Route::get('restaurants/{restaurant}/plates', [RestaurantController::class, 'getPlatesByRestaurant']);

// Rotta per mostrare un singolo piatto
Route::get('plates/{id}', [PlateController::class, 'show']);

// Rotta per ottenere tutti i tipi
Route::get('types', [RestaurantController::class, 'getTypes']);

Route::get('/braintree/token', [BraintreeController::class, 'generateToken']);

Route::post('/braintree/checkout', [BraintreeController::class, 'processPayment']);

Route::post('/save-order', [OrderController::class, 'storeOrderData']);