<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'password' => bcrypt('password'),
            'rol' => 'usuario'
        ]);
        User::create([
            'nombre' => 'Maria Lopez',
            'email' => 'maria.lopez@example.com',
            'password' => bcrypt('password'),
            'rol' => 'usuario'
        ]);
        User::create([
            'nombre' => 'Pedro Garcia',
            'email' => 'pedro.garcia@example.com',
            'password' => bcrypt('password'),
            'rol' => 'tecnico'
        ]);
        User::create([
            'nombre' => 'Ana Ramirez',
            'email' => 'ana.ramirez@example.com',
            'password' => bcrypt('password'),
            'rol' => 'tecnico'
        ]);
        User::create([
            'nombre' => 'Admin Master',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'rol' => 'admin'
        ]);
    }
}
