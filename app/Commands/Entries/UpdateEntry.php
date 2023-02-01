<?php

declare(strict_types=1);

namespace App\Commands\Entries;

use App\Http\DataObjects\NewEntry;
use App\Models\Entry;
use Illuminate\Support\Facades\DB;

final class UpdateEntry
{
    public function handle(NewEntry $entry, string $identifer): bool
    {
        return DB::transaction(
            callback: static fn (): bool => (bool) Entry::query()
                ->where('hash', $identifer)
                ->update(['url' =>  $entry->url]),
        );
    }
}
