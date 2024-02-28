<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener todos los usuarios con el rol de desarrollador
        $developerUsers = User::where('role_id', 2)->get();

        // Verificar si hay usuarios desarrolladores
        if ($developerUsers->isEmpty()) {
            // Si no hay usuarios, retorna un array vacío
            return [];
        }

        do {
            // Seleccionar un usuario desarrollador aleatorio
            $developerUser = $developerUsers->random();

            // Obtener una ID de proyecto existente de manera aleatoria
            $projectId = Project::inRandomOrder()->first()->id;

            // Verificar si ya existe una asignación con la misma combinación
            $existingAssignment = ProjectAssignment::where('project_id', $projectId)
                ->where('user_id', $developerUser->id)
                ->exists();

            // Si ya existe una asignación con esta combinación, se intenta nuevamente
        } while ($existingAssignment);

        // Retorna los datos para la nueva asignación
        return [
            'project_id' => $projectId,
            'user_id' => $developerUser->id
        ];
    }
}
