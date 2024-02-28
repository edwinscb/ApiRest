<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\State;

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
        $state = State::inRandomOrder()->first()->id;
        if ($adminUsers->isNotEmpty()) {
            $adminUser = $adminUsers->random();
        }
        return [
            'name' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'started_project' => fake()->date(),
            'state_id' => $state,
            'Created_by_id' => $adminUser->id
        ];
    }
}
