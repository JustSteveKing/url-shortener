<?php

declare(strict_types=1);

namespace App\Queries\Entries;

use App\Models\Entry;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

final class FetchEntry
{
    public function handle(Builder $builder, string $hash): Builder
    {
        return QueryBuilder::for(
            subject: Entry::class,
        )->allowedIncludes(
            includes: ['view'],
        )->where(
            'hash',
            $hash,
        )->getEloquentBuilder();
    }
}
