<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BatchSeeder::class,
            MajorSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            AlumniSeeder::class,

        ]);
    }
}
