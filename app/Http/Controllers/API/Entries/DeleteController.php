<?php

declare(strict_types=1);

namespace App\Http\Controllers\API\Entries;

use App\Http\Responses\MessageResponse;
use App\Jobs\Entries\DeleteExistingEntry;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use JustSteveKing\StatusCode\Http;

final class DeleteController
{
    public function __invoke(Request $request, string $hash): Responsable
    {
        dispatch(new DeleteExistingEntry(
            hash: $hash,
        ));

        return new MessageResponse(
            data: [
                'message' => 'We are processing your request.',
            ],
            status: Http::ACCEPTED,
        );
    }
}
