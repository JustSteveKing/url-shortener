<?php

declare(strict_types=1);

namespace App\Jobs\Entries;

use App\Aggregates\VisitAggregate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

final class RecordView implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly string $userAgent,
        public readonly string $hash,
    ) {}

    public function handle(): void
    {
        VisitAggregate::retrieve(
            uuid: Str::uuid()->toString(),
        )->createVisit(
            userAgent: $this->userAgent,
            hash: $this->hash,
        )->persist();
    }
}
