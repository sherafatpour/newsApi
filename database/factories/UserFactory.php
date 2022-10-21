<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(10)), // password
            'remember_token' => Str::random(10),
            'mobile' => $this->randomNumberSequence(),
            'verification_code' => mt_rand(1000, 9999),
            'user_role' => 'User',
            'user_status' => '1',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function randomNumberSequence($requiredLength = 7, $highestDigit = 8)
    {
        $numberPrefixes = ['0912', '0913', '0814', '0915', '0916', '0917', '0918', '0919', '0909', '0908', '0938', '0939', '0935', '0937'];
        $sequence = '';
        for ($i = 0; $i < $requiredLength; ++$i) {
            $sequence .= mt_rand(0, $highestDigit);
        }
        return $numberPrefixes[array_rand($numberPrefixes)] . $sequence;
    }
}
