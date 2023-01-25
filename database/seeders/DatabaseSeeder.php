<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            "name" => 'chrisvanlier2005',
            "email" => "chrisvanliercvl@gmail.com"
        ]);

        $team = Team::create([
            "name" => "Team 1",
            "slug" => "team-1"
        ]);

        $team->users()->attach(
            User::first(),
            ["role" => "owner"]
        );

    }
}
