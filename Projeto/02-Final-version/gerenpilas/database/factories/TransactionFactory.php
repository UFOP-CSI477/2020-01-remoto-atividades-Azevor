<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'category_id' => $this->faker->randomNumber(),
            'type' => $this->faker->boolean(),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'description' => $this->faker->text(),
            'value' => $this->faker->randomDigit()
        ];
    }
}
