<?php

namespace Database\Factories;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;

class DomainHitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $domainIds = Domain::query()->pluck('id');

        return [
            'domain_id' => $this->faker->randomElement($domainIds),
            'date' => $this->faker->dateTimeBetween('-3 years')->format('Y-m-d'),
            'times' => $this->faker->randomNumber(2),
        ];
    }
}
