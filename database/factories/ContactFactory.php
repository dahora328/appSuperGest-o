<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->tollFreePhonenumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'motivo_contato' => $this->faker->numberBetween(1,3),
            'mensagem' => $this->faker->text(200)
        ];
    }
}
