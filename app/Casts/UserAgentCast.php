<?php

declare(strict_types=1);

namespace App\Casts;

use App\DataObjects\Factories\UserAgentFactory;
use App\DataObjects\UserAgent;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Jenssegers\Agent\Agent;

final readonly class UserAgentCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): UserAgent
    {
        return (new UserAgentFactory(
            agent: new Agent(),
        ))->make(
            userAgent: $value,
        );
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
