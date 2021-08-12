<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin master',
            'email' => 'admin@hotmail.com',
            'admin' => true,
            'password' => bcrypt('bakayaro'),
        ]);

        User::create([
            'name' => 'user normal',
            'email' => 'user@hotmail.com',
            'admin' => false,
            'password' => bcrypt('bakayaro'),
        ]);
    }
}
