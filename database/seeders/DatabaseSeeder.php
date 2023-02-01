<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\View;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Entry::factory()
            ->count(10)
            ->create()
            ->map(
                fn (Entry $entry) => View::factory()
                    ->count(50)
                    ->for($entry)
                    ->create()
            );
    }
}
