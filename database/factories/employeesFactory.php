<?php

namespace Database\Factories;

use App\Models\employees;
use Illuminate\Database\Eloquent\Factories\Factory;

class employeesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = employees::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' =>$this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'company_id'=> rand(1,5),
            'phone' => $this->faker->phoneNumber
                   
        ];

    }
}