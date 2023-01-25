<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\TeamMessage;
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

        $teams =  Team::factory(10)->create();
        foreach($teams as $team){
            $team->users()->attach(User::all()->first(),[
                'role' => "normal"
            ]);
            // attach  messages
            TeamMessage::factory(10)->create([
                'team_id' => $team->id,
                'user_id' => User::all()->random(1)->first()->id
            ]);
        }


    }
}

