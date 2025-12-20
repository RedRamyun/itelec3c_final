<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['position_name' => 'President', 'description' => 'Chief Executive Officer'],
            ['position_name' => 'Vice President', 'description' => 'Deputy Chief Executive'],
            ['position_name' => 'Secretary', 'description' => 'Records Officer'],
            ['position_name' => 'Treasurer', 'description' => 'Finance Officer'],
        ];

        foreach ($positions as $position) {
            Position::updateOrCreate(
                ['position_name' => $position['position_name']],
                ['description' => $position['description']]
            );
        }
    }
}
