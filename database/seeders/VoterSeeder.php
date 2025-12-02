<?php

namespace Database\Seeders;

use App\Models\Voter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voters = [
            [
                'first_name' => 'Charlotte',
                'last_name' => 'Mercado',
                'birthdate' => '2004-07-07',
                'gender' => 'Male',
                'contact_information' => '09123456789',
                'imagepath' => 'test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Carlos Alfonso',
                'last_name' => 'Perez',
                'birthdate' => '2003-04-08',
                'gender' => 'Female',
                'contact_information' => '09123456789',
                'imagepath' => 'test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jade John Lloyd',
                'last_name' => 'de Lara',
                'birthdate' => '2003-12-25',
                'gender' => 'Male',
                'contact_information' => '09123456789',
                'imagepath' => 'test',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('voters')->insert($voters);
    }
}
