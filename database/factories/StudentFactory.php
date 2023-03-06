<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\student;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = student::class;
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'contact'=>$this->faker->unique()->phoneNumber(),
            'password'=>Hash::make("password"),
            'email_verified_at'=>now(),
            'pincode'=> $this->faker->randomNumber(6, true),
            'status' => $this->faker->randomElement([
                '0',
                '1'
            ]),
            "remember_token"=>Str::random(10),
            
        ];
    }
}
