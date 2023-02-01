<?php

declare(strict_types=1);

namespace App\Queries\Entries;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

final class FetchEntries
{
    public function handle(Builder $builder): Builder
    {
        return QueryBuilder::for(
            subject: $builder,
        )->getEloquentBuilder();
    }
}
