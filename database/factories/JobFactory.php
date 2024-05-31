<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => $this->faker->title(),
      'company' => $this->faker->company(),
      'salary' => $this->faker->randomElement(["$60,000", "$80,000", "$120,000"]),
      'location' => $this->faker->randomElement(["Remote", "In Site", "Hybrid"]),
      'schedule' => $this->faker->randomElement(["Full Time", "Part Time"]),
      'url' => $this->faker->url(),
      'featured' => $this->faker->boolean()
    ];
  }
}
