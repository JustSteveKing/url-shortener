<?php

declare(strict_types=1);

namespace App\DataObjects\Factories;

use App\DataObjects\UserAgent;
use Jenssegers\Agent\Agent;

final readonly class UserAgentFactory
{
    public function __construct(
        private Agent $agent,
    ) {}

    public function make(string $userAgent): UserAgent
    {
        $this->agent->setUserAgent(
            userAgent: $userAgent,
        );

        return new UserAgent(
            device: $this->agent->device(),
            platform: $this->agent->platform(),
            browser: $this->agent->browser(),
            languages: $this->agent->languages(),
        );
    }
}
