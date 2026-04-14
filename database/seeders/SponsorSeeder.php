<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsors = [
            [
                'name' => 'base',
                'hours' => 24,
                'price' => 2.99,
            ],
            [
                'name' => 'plus',
                'hours' => 72,
                'price' => 5.99,
            ],
            [
                'name' => 'premium',
                'hours' => 144,
                'price' => 9.99,
            ],

        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
