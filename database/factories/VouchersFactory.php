<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vouchers>
 */
class VouchersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?int $i = 0;


    public function definition(): array
    {
        static::$i++;
        // if (static::$i > 10) static::$i = 1;
        return [
            'id' => static::$i,
            'code' => 'dicscount' . static::$i * 2,
            'discount_amount' => static::$i * 2,
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
