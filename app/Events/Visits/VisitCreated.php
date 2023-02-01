<?php

declare(strict_types=1);

namespace App\Events\Visits;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class VisitCreated extends ShouldBeStored
{
    public function __construct(
        public readonly string $userAgent,
        public readonly string $hash,
    ) {}
}
