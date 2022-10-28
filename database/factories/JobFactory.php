<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->jobTitle(),
            'experience' => strval(fake()->randomDigit()),
            'type' => fake()->randomElement(['Full time', 'Part time', 'Internship', 'Remote']),
            'job_description' => fake()->paragraph(),
            'salary' => strval(fake()->randomDigit()),
            'company_id' => Company::factory(),
            'category_id' => Category::factory()
        ];
    }
}
