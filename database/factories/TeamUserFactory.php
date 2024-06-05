<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TeamUserFactory extends Factory
{
    protected $model = TeamUser::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'team_id' => Team::factory(),
        ];
    }
}
