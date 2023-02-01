<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Entry;
use Bvtterfly\LaravelHashids\HashIdBuilder;
use Bvtterfly\LaravelHashids\HashIdOptions;
use Illuminate\Database\Eloquent\Factories\Factory;

final class EntryFactory extends Factory
{
    protected $model = Entry::class;

    public function definition(): array
    {
        return [
            'hash' => HashIdBuilder::build(
                options: HashIdOptions::create()->setMinimumHashLength(
                    minHashLength: 5,
                ),
            )->encode(),
            'url' => $this->faker->url(),
            'include_utm' => $this->faker->boolean(),
            'forward_params' => $this->faker->boolean(),
            'view_count' => $this->faker->numberBetween(
                0,
                1_000,
            )
        ];
    }
}
