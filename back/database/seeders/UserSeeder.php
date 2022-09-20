<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'Sophy',
                'last_name' => 'Saeuy',
                'role' => 'alumni',
                'email' => 'sophysaeuy@gmail.com',
                'password' => '12345678',
                'phone' => 'string',
                'gender' => 'male',
                'profile' => 'sophy.png',
                'cover' => 'sp.png',
            ]
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
