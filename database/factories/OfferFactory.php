<?php

namespace Database\Factories;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $domainIds = Domain::query()->pluck('id');

        $ip = $this->faker->ipv4();
        $location = geoip($ip);

        return [
            'domain_id' => $this->faker->randomElement($domainIds),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'offer_price' => $this->faker->randomFloat(2, 0, 100000),
            'ip' => $ip,
            'country_code' => $location->iso_code,
            'country' => $location->country,
            'content' => $this->faker->text(),
            'created_at' => $this->faker->dateTimeBetween('-3 years')
        ];
    }
}
