<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Entries;

use App\Http\Resources\EntryResource;
use App\Http\Responses\CollectionResponse;
use App\Models\Entry;
use App\Queries\Entries\FetchEntries;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

final readonly class IndexController
{
    public function __construct(
        private FetchEntries $query,
    ) {}

    public function __invoke(Request $request): Responsable
    {
        $entries = $this->query->handle(
            builder: Entry::query(),
        );

        return new CollectionResponse(
            data: EntryResource::collection(
                resource: $entries->paginate(),
            ),
        );
    }
}
