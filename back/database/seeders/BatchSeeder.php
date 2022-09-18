<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batch = [
            [
                'generation' => "2022",
            ]
        ];
        foreach ($batch as $key => $value) {
            Batch::create($value);
        }
    }
}
