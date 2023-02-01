<?php

declare(strict_types=1);

namespace App\Jobs\Entries;

use App\Commands\Entries\DeleteEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class DeleteExistingEntry implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly string $hash,
    ) {}

    public function handle(DeleteEntry $command): void
    {
        $command->handle(
            hash: $this->hash,
        );
    }
}
