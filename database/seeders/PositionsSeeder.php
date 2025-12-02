<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'position_name' => 'Presidente',
                'description' => 'The Mastermind',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Vice President',
                'description' => 'Sidekick ni Presidente',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('positions')->insert($positions);
    }
}
