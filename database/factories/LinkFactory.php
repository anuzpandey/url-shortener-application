<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class LinkFactory extends Factory
{

    public function definition(): array
    {
        $domain = $this->faker->domainName();
        return [
            'title' => Str::extractDomainName($domain),
            'url' => $domain,
            'shortened_url' => Str::random(6),
            'counter' => 0,
            'user_id' => $this->faker->randomElement([null, User::where('user_type', UserType::CUSTOMER->value)->inRandomOrder()->first()->id]),
            'expired_at' => $this->faker->randomElement([null, $this->faker->dateTimeBetween('now', '+1 year')]),
        ];
    }
}
