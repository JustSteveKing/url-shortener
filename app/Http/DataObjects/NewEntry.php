<?php

declare(strict_types=1);

namespace App\Http\DataObjects;

final readonly class NewEntry
{
    public function __construct(
        public string $url,
    ) {}

    public function toArray(): array
    {
        return [
            'url' => $this->url,
        ];
    }
}
