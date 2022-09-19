<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumni = [
            [
            'user_id' => 1,
            'batch_id' => 1,
            'major_id'=>1,
            ]
        ];
        foreach ($alumni as $key => $value) {
            Alumni::create($value);
        }
    }
}
