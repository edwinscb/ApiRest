<?php

namespace Database\Seeders;

use App\Models\UserHistoryAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHistoryAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserHistoryAssignment::factory()->count(500)->create();
    }
}
