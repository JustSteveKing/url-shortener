<?php

declare(strict_types=1);

namespace App\Jobs\Entries;

use App\Commands\Entries\CreateEntry;
use App\Http\DataObjects\NewEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class CreateNewEntry implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly NewEntry $entry,
    ) {}

    public function handle(CreateEntry $command): void
    {
        $command->handle(
            entry: $this->entry,
        );
    }
}
