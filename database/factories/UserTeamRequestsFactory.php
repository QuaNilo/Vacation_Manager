<?php

namespace Database\Factories;

use App\Models\UserTeamRequests;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Team;
use App\Models\User;

class UserTeamRequestsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserTeamRequests::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'user_id' => fake()->word,
            'team_id' => fake()->word,
            'approved' => fake()->word,
            'created_at' => fake()->date('Y-m-d H:i:s'),
            'updated_at' => fake()->date('Y-m-d H:i:s')
        ];
    }
}
