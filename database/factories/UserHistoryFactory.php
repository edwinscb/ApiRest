<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use App\Models\State;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHistory>
 */
class UserHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminUsers = User::where('role_id', 1)->get();
        $projectId = Project::inRandomOrder()->first()->id;
        $state = State::inRandomOrder()->first()->id;

        if ($adminUsers->isNotEmpty()) {
            $adminUser = $adminUsers->random();
        }
        return [
            'name' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'criteria' => fake()->paragraph(),
            'state_id' => $state,
            'Created_by_id' => $adminUser->id,
            'project_id' => $projectId,
        ];
    }
}
