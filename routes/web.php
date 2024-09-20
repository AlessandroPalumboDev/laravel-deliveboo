<?php

use App\Http\Controllers\admin\PlateController;
use App\Http\Controllers\admin\RestaurantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('Restaurants', RestaurantController::class)->parameters([
            'Restaurants' => 'restaurant:slug',
        ]);
        Route::resource('Plates', PlateController::class)->parameters([
            'Plates' => 'plate:slug',
        ]);
        
        // Rotte per gli ordini
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

        // Rotte per le statistiche
        Route::get('/statistics', [OrderController::class, 'statistics'])->name('orders.statistics');
    });

require __DIR__ . '/auth.php';
