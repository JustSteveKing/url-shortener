<?php

declare(strict_types=1);

namespace App\Aggregates;

use App\Events\Visits\VisitCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

final class VisitAggregate extends AggregateRoot
{
    public function createVisit(string $userAgent, string $hash): VisitAggregate
    {
        $this->recordThat(
            domainEvent: new VisitCreated(
                userAgent: $userAgent,
                hash: $hash,
            )
        );

        return $this;
    }
}
