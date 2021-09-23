<?php

namespace Database\Factories;

use App\Models\Adress;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ligne1' => $this->faker->word(),
            'ligne2' => $this->faker->word(),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'city_id' => $this->faker->word()
        ];
    }
}