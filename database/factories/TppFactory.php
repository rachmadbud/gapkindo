<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tpp>
 */
class TppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_tpp'   => 'TPP' . $this->faker->unique()->numerify('###'),
            'perusahaan' => $this->faker->company(),
            'cabang'     => $this->faker->city(),
        ];
    }
}
