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
        // Disabilita i vincoli delle chiavi esterne prima di svuotare la tabella
        Schema::disableForeignKeyConstraints();

        // Svuota la tabella users
        DB::table('users')->truncate(); 

        $users = [
            [
                'name' => 'Adminuno',
                'surname' => 'User',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password'), // Cripta la password
                'p_iva' => '11111111111',
            ],
            [
                'name' => 'Admindue',
                'surname' => 'User',
                'email' => 'admin2@example.com',
                'password' => bcrypt('password'),
                'p_iva' => '22222222222',
            ],
            [
                'name' => 'Admintre',
                'surname' => 'User',
                'email' => 'admin3@example.com',
                'password' => bcrypt('password'),
                'p_iva' => '33333333333',
            ],
        ];

        
        foreach ($users as $userData) {

            $user = new User();
            $user->name = $userData['name'];
            $user->surname = $userData['surname'];
            $user->email = $userData['email'];
            $user->password = $userData['password'];
            $user->p_iva = $userData['p_iva'];

            $user->save();
            
        }

        // Riabilita i vincoli delle chiavi esterne
        Schema::enableForeignKeyConstraints();
    }
}
