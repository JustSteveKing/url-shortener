<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Entry;
use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ViewFactory extends Factory
{
    protected $model = View::class;

    public function definition(): array
    {
        return [
            'user_agent' => $this->faker->userAgent(),
            'entry_id' => Entry::factory(),
        ];
    }
}
