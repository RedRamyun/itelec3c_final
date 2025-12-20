<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elections = [
            ['status' => 'pending'],
            ['status' => 'ongoing'],
            ['status' => 'completed'],
        ];

        foreach ($elections as $election) {
            Election::create($election);
        }
    }
}