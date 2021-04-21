<?php

namespace Database\Factories;

use App\Models\Registro;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->word(),
            'datalimite' => $this->faker->date($format = 'Y-m-d'),
            'tipo' => $this->faker->randomElement($array = array(1, 2, 3)),
            'equipamento_id' => Equipamento::factory(),
            'user_id' => User::factory()
        ];
    }
}
