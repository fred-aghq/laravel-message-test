<?php

namespace Database\Factories;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->text(20),
            'body' => $this->faker->text(240),
            'sent' => $this->faker->dateTimeBetween(Carbon::now()->subMonth(), Carbon::now()),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function archived()
    {
        return $this->state(function (array $attributes) {
            return [
                'archived' => $this->faker->dateTimeBetween($attributes['sent'], Carbon::now()),
            ];
        });
    }

    public function read()
    {
        return $this->state(function (array $attributes) {
            return [
                'read' => $this->faker->dateTimeBetween($attributes['sent'], Carbon::now()),
            ];
        });
    }
}
