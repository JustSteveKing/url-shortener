<?php

namespace App\Projectors;

use App\Commands\Visits\CreateVisit;
use App\Events\Visits\VisitCreated;
use App\Models\Entry;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class VisitProjector extends Projector
{
    protected array $handlesEvents = [
        VisitCreated::class => 'onVisitCreated',
    ];

    public function onVisitCreated(VisitCreated $event): void
    {
        $entry = Entry::query()->where(
            'hash',
            $event->hash,
        )->firstOrFail();

        (new CreateVisit())->handle(
            userAgent: $event->userAgent,
            entry: $entry->getKey(),
        );

        $entry->update([
            'view_count' => intval($entry->getAttribute('view_count')) + 1,
        ]);
    }
}
