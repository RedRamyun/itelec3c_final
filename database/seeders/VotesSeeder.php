<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'created_at' => Carbon::now()->subDays(5)->setTime(10, 30, 0),
                'updated_at' => Carbon::now()->subDays(5)->setTime(10, 30, 0),
            ],
            [
                'voter_id' => 2,
                'candidate_id' => 2,
                'created_at' => Carbon::now()->subDays(4)->setTime(14, 15, 0),
                'updated_at' => Carbon::now()->subDays(4)->setTime(14, 15, 0),
            ],
            [
                'voter_id' => 3,
                'candidate_id' => 3,
                'created_at' => Carbon::now()->subDays(3)->setTime(9, 45, 0),
                'updated_at' => Carbon::now()->subDays(3)->setTime(9, 45, 0),
            ],
            [
                'voter_id' => 1,
                'candidate_id' => 4,
                'created_at' => Carbon::now()->subDays(5)->setTime(10, 32, 0),
                'updated_at' => Carbon::now()->subDays(5)->setTime(10, 32, 0),
            ],
            [
                'voter_id' => 2,
                'candidate_id' => 5,
                'created_at' => Carbon::now()->subDays(4)->setTime(14, 17, 0),
                'updated_at' => Carbon::now()->subDays(4)->setTime(14, 17, 0),
            ],
            [
                'voter_id' => 3,
                'candidate_id' => 6,
                'created_at' => Carbon::now()->subDays(3)->setTime(9, 47, 0),
                'updated_at' => Carbon::now()->subDays(3)->setTime(9, 47, 0),
            ],
            [
                'voter_id' => 1,
                'candidate_id' => 7,
                'created_at' => Carbon::now()->subDays(5)->setTime(10, 35, 0),
                'updated_at' => Carbon::now()->subDays(5)->setTime(10, 35, 0),
            ],
            [
                'voter_id' => 2,
                'candidate_id' => 8,
                'created_at' => Carbon::now()->subDays(4)->setTime(14, 20, 0),
                'updated_at' => Carbon::now()->subDays(4)->setTime(14, 20, 0),
            ],
            [
                'voter_id' => 3,
                'candidate_id' => 9,
                'created_at' => Carbon::now()->subDays(3)->setTime(9, 50, 0),
                'updated_at' => Carbon::now()->subDays(3)->setTime(9, 50, 0),
            ],
            [
                'voter_id' => 1,
                'candidate_id' => 10,
                'created_at' => Carbon::now()->subDays(5)->setTime(10, 38, 0),
                'updated_at' => Carbon::now()->subDays(5)->setTime(10, 38, 0),
            ],
            [
                'voter_id' => 2,
                'candidate_id' => 1,
                'created_at' => Carbon::now()->subDays(4)->setTime(14, 22, 0),
                'updated_at' => Carbon::now()->subDays(4)->setTime(14, 22, 0),
            ],
            [
                'voter_id' => 3,
                'candidate_id' => 2,
                'created_at' => Carbon::now()->subDays(3)->setTime(9, 52, 0),
                'updated_at' => Carbon::now()->subDays(3)->setTime(9, 52, 0),
            ],
        ];

        DB::table('votes')->insert($votes);
    }
}