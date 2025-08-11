<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Soporte Tecnico',
            'descripcion' => 'Problemas de hardware y software.'
        ]);
        Categoria::create([
            'nombre' => 'Mantenimiento',
            'descripcion' => 'Inconvenientes con la infraestructura.'
        ]);
    }
}
