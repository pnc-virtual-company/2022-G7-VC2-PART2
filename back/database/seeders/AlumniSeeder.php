<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Integer;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnis')->insert([
            'user_id' => 1,
            'batch_id' => 1,
            'major_id'=>1
            
        ]);
    }
}
