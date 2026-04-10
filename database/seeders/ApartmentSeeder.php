<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Apartment;
use App\Models\Service;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = [
            [
                'title'           => 'Attico con Vista sul Colosseo',
                'description'     => 'Splendido attico nel cuore di Roma con terrazza panoramica affacciata sul Colosseo.',
                'rooms'           => 4,
                'bathrooms'       => 2,
                'bedrooms'        => 2,
                'square_meters'   => 95,
                'address'         => 'Via Sacra 12, Roma, RM',
                'latitude'        => 41.8902102,
                'longitude'       => 12.4922309,
                'image'           => 'apartments/attico-colosseo.jpg',
                'price_per_night' => 180.00,
                'visibility'      => true,
            ],
            [
                'title'           => 'Appartamento Moderno Trastevere',
                'description'     => 'Accogliente appartamento nel vivace quartiere Trastevere, a due passi dai migliori ristoranti.',
                'rooms'           => 3,
                'bathrooms'       => 1,
                'bedrooms'        => 1,
                'square_meters'   => 60,
                'address'         => 'Vicolo del Cinque 8, Roma, RM',
                'latitude'        => 41.8893571,
                'longitude'       => 12.4697602,
                'image'           => 'apartments/trastevere.jpg',
                'price_per_night' => 95.00,
                'visibility'      => true,
            ],
            [
                'title'           => 'Villa con Piscina sui Castelli Romani',
                'description'     => 'Ampia villa con piscina privata, barbecue e giardino. Ideale per famiglie.',
                'rooms'           => 7,
                'bathrooms'       => 3,
                'bedrooms'        => 4,
                'square_meters'   => 220,
                'address'         => 'Via dei Laghi 45, Castel Gandolfo, RM',
                'latitude'        => 41.7483600,
                'longitude'       => 12.6487200,
                'image'           => 'apartments/villa-castelli.jpg',
                'price_per_night' => 320.00,
                'visibility'      => true,
            ],
            [
                'title'           => 'Loft Design nel Quartiere Prati',
                'description'     => 'Elegante loft con soffitti alti e design contemporaneo, a 10 minuti dal Vaticano.',
                'rooms'           => 2,
                'bathrooms'       => 1,
                'bedrooms'        => 1,
                'square_meters'   => 50,
                'address'         => 'Via Cola di Rienzo 88, Roma, RM',
                'latitude'        => 41.9091700,
                'longitude'       => 12.4620500,
                'image'           => 'apartments/loft-prati.jpg',
                'price_per_night' => 110.00,
                'visibility'      => true,
            ],
            [
                'title'           => 'Casa Vacanze sul Lago di Bracciano',
                'description'     => 'Casa vacanze con accesso privato alla spiaggia e vista mozzafiato sul lago.',
                'rooms'           => 5,
                'bathrooms'       => 2,
                'bedrooms'        => 3,
                'square_meters'   => 130,
                'address'         => 'Lungolago degli Angeli 3, Bracciano, RM',
                'latitude'        => 42.1006800,
                'longitude'       => 12.1773400,
                'image'           => 'apartments/lago-bracciano.jpg',
                'price_per_night' => 200.00,
                'visibility'      => false,
            ],
        ];

        foreach ($apartments as $data) {
            $apartment = Apartment::create($data);
            $serviceIds = \App\Models\Service::inRandomOrder()->take(rand(2, 5))->pluck('id');
            $apartment->services()->attach($serviceIds);
        }
    }
}
