<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Entries;

use App\Http\DataObjects\NewEntry;
use App\Http\Requests\API\Entries\StoreRequest;
use App\Http\Responses\MessageResponse;
use App\Jobs\Entries\CreateNewEntry;
use Illuminate\Contracts\Support\Responsable;
use JustSteveKing\StatusCode\Http;

final readonly class StoreController
{
    public function __invoke(StoreRequest $request): Responsable
    {
        dispatch(new CreateNewEntry(
            entry: new NewEntry(
                url: strval($request->get('url')),
            )
        ));

        return new MessageResponse(
            data: [
                'message' => 'We are processing your request.',
            ],
            status: Http::ACCEPTED,
        );
    }
}
