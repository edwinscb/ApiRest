<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectAssignmentSeeder::class);
        $this->call(UserHistorySeeder::class);
        $this->call(UserHistoryAssignmentSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(TaskAssignmentSeeder::class);
    }
}
