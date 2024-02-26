<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectAssignment>
 */
class ProjectAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $developerUsers = User::where('role_id', 2)->get();
        if ($developerUsers->isNotEmpty()) {
            $developerUser = $developerUsers->random();
        }


        return [
            'project_id' => function () {
                // Obtener una ID de proyecto existente de manera aleatoria
                return Project::inRandomOrder()->first()->id;
            },
            'user_id' => $developerUser
        ];
    }
}
