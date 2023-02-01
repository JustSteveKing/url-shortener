<?php

declare(strict_types=1);

namespace App\Commands\Visits;

use App\Models\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class CreateVisit
{
    public function handle(string $userAgent, int $entry): Model
    {
        return DB::transaction(
            callback: static fn (): Model => View::query()->create(
                attributes: [
                    'user_agent' => $userAgent,
                    'entry_id' => $entry,
                ],
            ),
        );
    }
}
