<?php

declare(strict_types=1);

namespace App\Jobs\Entries;

use App\Commands\Entries\UpdateEntry;
use App\Http\DataObjects\NewEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class UpdateExistingEntry implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly NewEntry $entry,
        public readonly string $identifier,
    ) {}

    public function handle(UpdateEntry $command): void
    {
        $command->handle(
            entry: $this->entry,
            identifer: $this->identifier,
        );
    }
}
