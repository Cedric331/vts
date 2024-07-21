<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence,
            'media_plan_id' => \App\Models\MediaPlan::all()->random()->id,
            'sender_id' => \App\Models\User::all()->random()->id,
            'read_at' => null,
        ];
    }
}
