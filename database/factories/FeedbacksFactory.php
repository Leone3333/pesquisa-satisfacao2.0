<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedbacks>
 */
class FeedbacksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tipoFeedback' => $this->faker->randomElement([1,2,3]),
            'setor' => $this->faker->jobTitle(),
            'comentario' => Str::random(10),
            // 'updated_at' => now(),
            // 'created_at' => now(),
        ];
    }
}
