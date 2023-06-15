<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'contact' => $this->faker->unique()->phoneNumber(),
            'status' => $this->faker->randomDigit(0, 1),
            'address' => $this->faker->address(),
            'password' => Hash::make('password'),
            'pincode' => $this->faker->numerify('######'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
