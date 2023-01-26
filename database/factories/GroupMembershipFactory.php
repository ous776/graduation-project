<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupMembership>
 */
class GroupMembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => ($this->faker->randomNumber(1, true) % 4) + 1,
            'group_id' =>  ($this->faker->randomNumber(1, true) % 5) + 1
        ];
    }
}
