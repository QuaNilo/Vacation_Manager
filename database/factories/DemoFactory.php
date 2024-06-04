<?php

namespace Database\Factories;

use App\Models\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class DemoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Demo::class;

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
            'demo_id' => faker()->word,
            'user_id' => faker()->word,
            'name' => faker()->text(faker()->numberBetween(5, 255)),
            'body' => faker()->text(faker()->numberBetween(5, 65535)),
            'phone' => faker()->numerify('0##########'),
            'vat' => faker()->text(faker()->numberBetween(5, 32)),
            'zip' => faker()->text(faker()->numberBetween(5, 16)),
            'optional' => faker()->text(faker()->numberBetween(5, 255)),
            'body_optional' => faker()->text(faker()->numberBetween(5, 65535)),
            'value' => faker()->numberBetween(0, 9223372036854775807),
            'date' => faker()->date('Y-m-d'),
            'datetime' => faker()->date('Y-m-d H:i:s'),
            'checkbox' => faker()->boolean,
            'privacy_policy' => faker()->boolean,
            'status' => faker()->word,
            'order_column' => faker()->numberBetween(1, 32767),
            'created_at' => faker()->date('Y-m-d H:i:s'),
            'updated_at' => faker()->date('Y-m-d H:i:s')
        ];
    }
}
