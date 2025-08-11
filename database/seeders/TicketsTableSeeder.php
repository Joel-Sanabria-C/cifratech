<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::create([
            'usuario_id' => 1,
            'categoria_id' => 1,
            'tecnico_id' => 3,
            'titulo' => 'Problema con mi pc',
            'descripcion' => 'La pantalla de mi ordenador no enciende.',
            'estado' => 'abierto',
            'fecha_vencimiento' => Carbon::now()->addDays(5)
        ]);
        Ticket::create([
            'usuario_id' => 2,
            'categoria_id' => 2,
            'tecnico_id' => 4,
            'titulo' => 'Falla en el aire acondicionado',
            'descripcion' => 'El aire acondicionado de la sala de reuniones no funciona.',
            'estado' => 'en_proceso',
            'fecha_vencimiento' => Carbon::now()->addDays(3)
        ]);
    }
}
