<?php

declare(strict_types=1);

namespace App\Http\DataObjects;

final readonly class NewEntry
{
    public function __construct(
        public string $url,
        public bool $includeUTM = true,
        public bool $forwardParams = false,
    ) {}

    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'include_utm' => $this->includeUTM,
            'forward_params' => $this->forwardParams,
        ];
    }
}
