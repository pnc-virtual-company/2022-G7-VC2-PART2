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
                'generation' => "2010",
                'generation' => "2011",
                'generation' => "2012",
                'generation' => "2013",
                'generation' => "2014",
                'generation' => "2015",
                'generation' => "2016",
                'generation' => "2017",
                'generation' => "2018",
                'generation' => "2019",
                'generation' => "2020",
                'generation' => "2021",
                'generation' => "2022"
            ]
        ];
        foreach ($batch as $key => $value) {
            Batch::create($value);
        }
    }
}
