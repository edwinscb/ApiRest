<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\UserHistory;
use App\Models\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::inRandomOrder()->first()->id;
        $userHistoryId = UserHistory::inRandomOrder()->first()->id;
        $state = State::inRandomOrder()->first()->id;
        return [
            'name' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'state_id' => $state,
            'user_history_id' => $userHistoryId,
            'created_by_id' => $userId,
        ];
    }
}
