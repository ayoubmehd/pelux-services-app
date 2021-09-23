<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'lat' => $this->faker->randomDigitNotNull(),
            'long' => $this->faker->randomDigitNotNull(),
            // 'city_id' => City::inRandomOrder()->get()->id,
            'is_publised' => $this->faker->randomElement([0, 1])
        ];
    }
}