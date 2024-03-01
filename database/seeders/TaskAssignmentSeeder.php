<?php

namespace Database\Seeders;

use App\Models\TaskAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskAssignment::factory()->count(700)->create();
    }
}
