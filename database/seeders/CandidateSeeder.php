<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = [
            [
                'candidate_name' => 'Janna Rafaela Villacorta',
                'party_affiliation' => 'Makibaka Partylist',
                'position_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'candidate_name' => 'Maverick Angela Shibal',
                'party_affiliation' => 'Flood Control Partylist',
                'position_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'candidate_name' => 'Percy Shibala',
                'party_affiliation' => 'Batas Partylist',
                'position_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('candidates')->insert($candidates);
    }
}
