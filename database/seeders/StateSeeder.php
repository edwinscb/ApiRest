<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el estado de nuevo
        State::create([
            'name' => 'nuevo',
        ]);

        // Crear el estado de desarrollo
        State::create([
            'name' => 'en desarrollo',
        ]);

        // Crear el estado de Finalizado
        State::create([
            'name' => 'finalizado',
        ]);
    }
}
