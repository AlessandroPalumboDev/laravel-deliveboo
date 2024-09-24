<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate(); 

        $users = [
            ['name' => 'Mc', 'surname' => 'donald', 'email' => 'mcdonald@example.com', 'p_iva' => '11111111111'],
            ['name' => 'La', 'surname' => 'Napoli', 'email' => 'lanapoli@example.com', 'p_iva' => '22222222222'],
            ['name' => 'Il', 'surname' => 'Carbonaro', 'email' => 'ilcarbonaro@example.com', 'p_iva' => '33333333333'],
            ['name' => 'Sakura', 'surname' => 'Owner', 'email' => 'sakura@example.com', 'p_iva' => '44444444444'],
            ['name' => 'Ramen', 'surname' => 'Master', 'email' => 'ramen@example.com', 'p_iva' => '55555555555'],
            ['name' => 'Teppanyaki', 'surname' => 'Chef', 'email' => 'teppanyaki@example.com', 'p_iva' => '66666666666'],
            ['name' => 'Izakaya', 'surname' => 'Manager', 'email' => 'izakaya@example.com', 'p_iva' => '77777777777'],
            ['name' => 'Matcha', 'surname' => 'Barista', 'email' => 'matcha@example.com', 'p_iva' => '88888888888'],
            ['name' => 'Tempura', 'surname' => 'Expert', 'email' => 'tempura@example.com', 'p_iva' => '99999999999'],
            ['name' => 'Udon', 'surname' => 'Maker', 'email' => 'udon@example.com', 'p_iva' => '10101010101'],
            ['name' => 'Bento', 'surname' => 'Packer', 'email' => 'bento@example.com', 'p_iva' => '12121212121'],
            ['name' => 'Yakitori', 'surname' => 'Griller', 'email' => 'yakitori@example.com', 'p_iva' => '13131313131'],
            ['name' => 'Soba', 'surname' => 'Specialist', 'email' => 'soba@example.com', 'p_iva' => '14141414141'],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'surname' => $userData['surname'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
                'p_iva' => $userData['p_iva'],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}