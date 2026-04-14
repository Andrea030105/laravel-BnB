<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'apartment_id' => 6,
                'email'   => 'mario.rossi@email.com',
                'name'    => 'Mario Rossi',
                'content' => 'Buongiorno, vorrei sapere se l\'appartamento è disponibile per il mese di agosto. Grazie mille!',
            ],
            [
                'apartment_id' => 6,
                'email'   => 'giulia.bianchi@email.com',
                'name'    => 'Giulia Bianchi',
                'content' => 'Ciao! Ho visto il vostro annuncio e sono molto interessata. È possibile portare animali domestici?',
            ],
            [
                'apartment_id' => 6,
                'email'   => 'luca.verdi@email.com',
                'name'    => 'Luca Verdi',
                'content' => 'Salve, vorrei prenotare per una settimana a settembre. Come posso procedere?',
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
