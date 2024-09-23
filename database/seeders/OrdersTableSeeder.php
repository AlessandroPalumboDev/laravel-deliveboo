<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('orders')->truncate();

        $restaurants = Restaurant::pluck('id')->toArray();
        $orderStatuses = ['In preparazione', 'In consegna', 'Consegnato'];
        $baseDate = Carbon::create(2023, 1, 1);

        $orders = [];

        foreach ($restaurants as $restaurantId) {
            for ($month = 1; $month <= 12; $month++) {
                $ordersPerMonth = rand(10, 20);
                for ($i = 0; $i < $ordersPerMonth; $i++) {
                    $orders[] = $this->generateOrder($restaurantId, $baseDate->copy()->month($month));
                }
            }
        }

        // Chunk insert for better performance
        foreach (array_chunk($orders, 100) as $chunk) {
            Order::insert($chunk);
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Generate a single order.
     *
     * @param int $restaurantId
     * @param Carbon $date
     * @return array
     */
    private function generateOrder($restaurantId, $date): array
    {
        $orderStatuses = ['In preparazione', 'In consegna', 'Consegnato'];

        return [
            'restaurant_id' => $restaurantId,
            'total_price' => $this->generatePrice(),
            'delivery_address' => $this->generateAddress(),
            'name' => $this->generateName(),
            'surname' => $this->generateSurname(),
            'email_address' => $this->generateEmail(),
            'order_status' => $orderStatuses[array_rand($orderStatuses)],
            'delivery_time' => $date->copy()->addHours(rand(1, 4))->format('Y-m-d H:i:s'),
            'note' => $this->generateNote(),
            'created_at' => $date->copy()->addMinutes(rand(0, 1439))->format('Y-m-d H:i:s'),
            'updated_at' => now(),
        ];
    }

    private function generatePrice(): float
    {
        return round(rand(1000, 10000) / 100, 2);
    }

    private function generateAddress(): string
    {
        $streets = ['Via Roma', 'Via Garibaldi', 'Corso Italia', 'Piazza Duomo'];
        return $streets[array_rand($streets)] . ', ' . rand(1, 100);
    }

    private function generateName(): string
    {
        $names = ['Mario', 'Luigi', 'Giovanni', 'Giuseppe', 'Antonio', 'Francesco'];
        return $names[array_rand($names)];
    }

    private function generateSurname(): string
    {
        $surnames = ['Rossi', 'Bianchi', 'Verdi', 'Russo', 'Ferrari', 'Esposito'];
        return $surnames[array_rand($surnames)];
    }

    private function generateEmail(): string
    {
        return strtolower($this->generateName() . '.' . $this->generateSurname() . '@example.com');
    }

    private function generateNote(): string
    {
        $notes = ['Nessuna nota', 'Consegnare al piano', 'Citofonare forte', 'Lasciare davanti alla porta'];
        return $notes[array_rand($notes)];
    }
}