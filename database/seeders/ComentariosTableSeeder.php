<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comentario::create([
            'ticket_id' => 1,
            'usuario_id' => 1,
            'mensaje' => 'Revise los cables y están bien conectados.'
        ]);
        Comentario::create([
            'ticket_id' => 1,
            'usuario_id' => 3,
            'mensaje' => 'Estoy revisando el caso, pronto te doy una respuesta.'
        ]);
        Comentario::create([
            'ticket_id' => 2,
            'usuario_id' => 2,
            'mensaje' => 'Necesito que se revise el equipo de aire.'
        ]);
        Comentario::create([
            'ticket_id' => 2,
            'usuario_id' => 4,
            'mensaje' => 'Me han asignado este ticket. Estaré en tu oficina en 10 minutos.'
        ]);
    }
}
