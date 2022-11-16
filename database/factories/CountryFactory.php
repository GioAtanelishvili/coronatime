<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'code' => fake()->unique()->countryCode(),
			'name' => [
				'en' => fake()->word(),
				'ka' => fake()->word(),
			],
			'confirmed' => fake()->randomNumber(5),
			'recovered' => fake()->randomNumber(5),
			'critical'  => fake()->randomNumber(5),
			'deaths'    => fake()->randomNumber(5),
		];
	}
}
