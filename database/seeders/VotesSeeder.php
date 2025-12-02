<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votes = [
            [
                'voter_id' => 1,
                'candidate_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voter_id' => 2,
                'candidate_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voter_id' => 3,
                'candidate_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('votes')->insert($votes);
    }
}
