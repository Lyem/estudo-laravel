<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{

    protected $model = \App\Models\Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence($nbWords = 3, $variableNbWords = true);
        return [
            'title' => $name,
            'description' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'body' => $this->faker->sentence($nbWords = 100, $variableNbWords = true),
            'slug' => Str::slug($name),
            'start_event' => $this->faker->dateTimeAD($max = 'now', $timezone = 'UTC')
        ];
    }
}
