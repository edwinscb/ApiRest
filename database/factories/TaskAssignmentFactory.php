<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\UserHistory;
use App\Models\UserHistoryAssignment;
use App\Models\Task;
use App\Models\TaskAssignment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskAssignment>
 */
class TaskAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingTask = false;
        $userId = null;

        do {
            do {
                $taskId = Task::inRandomOrder()->first()->id;

                $userHistory = UserHistory::whereHas('tasks', function ($query) use ($taskId) {
                    $query->where('id', $taskId);
                })->inRandomOrder()->first();

                $userHistoryAssignments = UserHistoryAssignment::where('user_history_id', $userHistory->id)->get();
            } while ($userHistoryAssignments->isEmpty());

            $randomUserHistoryAssignments = $userHistoryAssignments->random();

            $userId = $randomUserHistoryAssignments->user_id;

            $existingAssignment = TaskAssignment::where('task_id', $taskId)
                ->where('user_id', $userId)
                ->exists();
        } while ($existingAssignment);

        return [
            'task_id' => $taskId,
            'user_id' => $userId
        ];
    }
}
