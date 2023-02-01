<?php

declare(strict_types=1);

namespace App\DataObjects;

final readonly class UserAgent
{
    public function __construct(
        public string $device,
        public string $platform,
        public string $browser,
        public array $languages,
    ) {}

    public function toArray(): array
    {
        return [
            'device' => $this->device,
            'platform' => $this->platform,
            'browser' => $this->browser,
            'languages' => $this->languages,
        ];
    }
}
