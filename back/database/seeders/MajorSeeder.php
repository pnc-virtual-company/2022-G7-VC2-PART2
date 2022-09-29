<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major = [
            [
                'name' => "WEB",
                'name' => "SNA",
            ]
        ];
        foreach ($major as $key => $value) {
            Major::create($value);
        }
    }
}
