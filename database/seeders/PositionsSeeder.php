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
                'position_name' => 'President',
                'description' => 'The chief executive officer of the organization, responsible for overall leadership and strategic direction.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Vice President',
                'description' => 'Assists the President and assumes presidential duties in their absence.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Secretary',
                'description' => 'Maintains official records, manages correspondence, and documents all meetings and proceedings.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Treasurer',
                'description' => 'Manages financial affairs, maintains budget records, and oversees all monetary transactions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Auditor',
                'description' => 'Reviews and verifies financial records and ensures proper use of funds.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Public Relations Officer',
                'description' => 'Manages public image, handles communications, and promotes organizational activities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Business Manager',
                'description' => 'Oversees business operations, partnerships, and commercial activities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Grade 11 Representative',
                'description' => 'Represents the interests and concerns of Grade 11 students.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_name' => 'Grade 12 Representative',
                'description' => 'Represents the interests and concerns of Grade 12 students.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('positions')->insert($positions);
    }
}