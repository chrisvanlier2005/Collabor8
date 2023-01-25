<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\TeamMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TeamMessageFactory extends Factory
{
    protected $model = TeamMessage::class;

    public function definition(): array
    {
        return [
            'message' => $this->faker->realText(255),
            'media_type' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'team_id' => Team::factory(),
            'user_id' => User::factory(),
        ];
    }
}
