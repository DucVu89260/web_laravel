<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'level' => 0,
            'password'=> '123',
        ];
        User::create($data);
        
        $data = [
            'name' => 'Super Admin',
            'email' => 'sadmin@example.com',
            'level' => 1,
            'password'=> '123',
        ];
        User::create($data);
    }   
}
