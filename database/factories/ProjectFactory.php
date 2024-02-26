<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminUsers = User::where('role_id', 1)->get();
        if ($adminUsers->isNotEmpty()) {
            $adminUser = $adminUsers->random();
        }
        return [
            'name' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'started_project' => fake()->date(),
            'state_id' => fake()->numberBetween(1, 3),
            'Created_by_id' => $adminUser->id,
        ];
    }
}
