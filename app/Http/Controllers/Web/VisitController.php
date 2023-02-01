<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Builders\RedirectBuilder;
use App\Jobs\Entries\RecordView;
use App\Models\Entry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final readonly class VisitController
{
    public function __construct(
        private RedirectBuilder $builder,
    ) {}

    public function __invoke(Request $request, string $hash): RedirectResponse
    {
        $entry = Entry::query()->where('hash', $hash)->firstOrFail();

        dispatch(new RecordView(
            userAgent: $request->header(
                key: 'user-agent',
            ),
            hash: $hash,
        ));

        return new RedirectResponse(
            url: $this->builder->build(
                url: $entry->getAttribute('url'),
                parameters: $request->all(),
                useParameters: $entry->getAttribute('forward_params'),
                includeUtm: $entry->getAttribute('include_utm'),
            ),
        );
    }
}
