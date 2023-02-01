<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Entries;

use App\Http\DataObjects\NewEntry;
use App\Http\Requests\API\Entries\UpdateRequest;
use App\Http\Responses\MessageResponse;
use App\Jobs\Entries\UpdateExistingEntry;
use Illuminate\Contracts\Support\Responsable;
use JustSteveKing\StatusCode\Http;

final class UpdateController
{
    public function __invoke(UpdateRequest $request, string $hash): Responsable
    {
        dispatch(new UpdateExistingEntry(
            entry: new NewEntry(
                url: strval($request->get('url')),
            ),
            identifier: $hash,
        ));

        return new MessageResponse(
            data: [
                'message' => 'We are processing your request.',
            ],
            status: Http::ACCEPTED,
        );
    }
}
