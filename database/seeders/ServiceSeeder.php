<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'WiFi',              'icon' => 'bi bi-wifi'],
            ['name' => 'Parcheggio',        'icon' => 'bi bi-p-circle'],
            ['name' => 'Piscina',           'icon' => 'bi bi-water'],
            ['name' => 'Portineria',        'icon' => 'bi bi-person-badge'],
            ['name' => 'Sauna',             'icon' => 'bi bi-thermometer-sun'],
            ['name' => 'Vista Mare',        'icon' => 'bi bi-tsunami'],
            ['name' => 'Colazione',         'icon' => 'bi bi-cup-hot'],
            ['name' => 'Aria Condizionata', 'icon' => 'bi bi-wind'],
        ];

        DB::table('services')->insert($services);
    }
}
