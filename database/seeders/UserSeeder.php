<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Usuario Admin',
            'email' => 'min@gmail.comad',
            'password' => Hash::make('1002194617'),  
        ]);
        $user1->assignRole('admin');

        $user2 = User::create([
            'name' => 'Usuario Asistente',
            'email' => 'asistente@gmail.com',
            'password' => Hash::make('1002194617'),  
        ]);
        $user2->assignRole('asistente');
    }
    
}
