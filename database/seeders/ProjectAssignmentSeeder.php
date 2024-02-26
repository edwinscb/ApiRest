<?php

namespace Database\Seeders;

use App\Models\ProjectAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectAssignment::factory()->count(300)->create();
    }
}
