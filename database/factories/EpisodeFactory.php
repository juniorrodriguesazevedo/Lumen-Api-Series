<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'serie_id' => Serie::factory(),
            'season' => $this->faker->randomDigitNotNull(),
            'number' => $this->faker->numberBetween(1, 25),
            'watched' => $this->faker->boolean()
        ];
    }
}
