<?php

namespace Database\Seeders;

use App\Models\VoteCount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteCountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $votecounts = [
            [
                'candidate_id' => 1,
                'vote_count' => 11,
            ],
            [
                'candidate_id' => 2,
                'vote_count' => 123,
            ],
            [
                'candidate_id' => 3,
                'vote_count' => 911,
            ]
        ];
        
        DB::table('vote_counts')->insert($votecounts);
    }
}
