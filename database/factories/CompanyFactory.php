<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => fake()->company(),
            'industry' => fake()->word(),
            'company_email' => fake()->unique()->companyEmail(),
            'password' => 'password', // password
            'location' => fake()->country(),
            'company_description' => fake()->paragraph(),
            'image' => fake()->imageUrl()
        ];
    }
}
