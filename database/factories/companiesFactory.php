<?php

namespace Database\Factories;

use App\Models\companies;
use Illuminate\Database\Eloquent\Factories\Factory;

class companiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = companies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->email,
            'website' => $this->faker->url
        ];
    }
}