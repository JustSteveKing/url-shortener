<?php

declare(strict_types=1);

namespace App\Commands\Entries;

use App\Http\DataObjects\NewEntry;
use App\Models\Entry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class CreateEntry
{
    public function handle(NewEntry $entry): Model
    {
        return DB::transaction(
            callback: static fn (): Model => Entry::query()->create(
                attributes: $entry->toArray(),
            ),
        );
    }
}
