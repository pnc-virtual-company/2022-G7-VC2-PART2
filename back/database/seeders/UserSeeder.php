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
                'firstName' => 'Sophy',
                'lastName' => 'Saeuy',
                'email' => 'sophysaeuy@gmail.com',
                'email_verified_at' => now(),
                'password' => '12345678',
                'phone' => 'string',
                'gender' => 'gender',
                'profile' => 'sophy.png',
                'cover' => 'sp.png',
            ]
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
