<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Entries;

use App\Http\Resources\EntryResource;
use App\Http\Responses\ModelResponse;
use App\Models\Entry;
use App\Queries\Entries\FetchEntry;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

final readonly class ShowController
{
    public function __construct(
        private FetchEntry $query,
    ) {}

    public function __invoke(Request $request, string $hash): Responsable
    {
        $entry = $this->query->handle(
            builder: Entry::query(),
            hash: $hash,
        )->firstOrFail();

        return new ModelResponse(
            data: new EntryResource(
                resource: $entry,
            ),
        );
    }
}
