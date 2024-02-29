<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserHistory;
use App\Models\Project;
use App\Models\ProjectAssignment;
use App\Models\UserHistoryAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserHistoryAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingAssignment = false;
        $userId = null;
        do {

            do {
                // Obtener un ID de historial de usuario existente de manera aleatoria
                $userHistoryId = UserHistory::inRandomOrder()->first()->id;

                // Buscar un proyecto asociado con el user_history_id
                $project = Project::whereHas('userHistories', function ($query) use ($userHistoryId) {
                    $query->where('id', $userHistoryId); // Aquí cambiamos 'user_history_id' por 'id'
                })->inRandomOrder()->first();

                // Obtener todos los usuarios asignados a este proyecto
                $projectsAssignments = ProjectAssignment::where('project_id', $project->id)->get();
            } while ($projectsAssignments->isEmpty());
            // Seleccionar un ProjectAssignment al azar
            $randomProjectAssignment = $projectsAssignments->random();

            // Guardar el user_id en una variable
            $userId = $randomProjectAssignment->user_id;

            // Verificar si ya existe una asignación con la misma combinación de user_history_id y user_id
            $existingAssignment = UserHistoryAssignment::where('user_history_id', $userHistoryId)
                ->where('user_id', $userId)
                ->exists();
        } while ($existingAssignment);

        // Retorna los datos para la nueva asignación
        return [
            'user_history_id' => $userHistoryId,
            'user_id' => $userId
        ];
    }
}
