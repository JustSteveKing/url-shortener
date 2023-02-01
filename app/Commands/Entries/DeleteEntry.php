<?php

declare(strict_types=1);

namespace App\Commands\Entries;

use App\Models\Entry;
use Illuminate\Support\Facades\DB;

final class DeleteEntry
{
    public function handle(string $hash): bool
    {
        return DB::transaction(
            callback: static fn (): bool => Entry::query()
                ->where(
                    'hash',
                    $hash,
                )->delete(),
        );
    }
}
