<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;


class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name' => fake()->text(fake()->numberBetween(5, 255)),
            'category' => fake()->text(fake()->numberBetween(5, 255)),
            'members_max_vacation_days' => fake()->word,
            'members_max_on_vacation' => fake()->word,
            'members_vacation_days_regen_monthly' => fake()->word,
            'created_at' => fake()->date('Y-m-d H:i:s'),
            'updated_at' => fake()->date('Y-m-d H:i:s')
        ];
    }
}
