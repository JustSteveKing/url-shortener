<?php

declare(strict_types=1);

namespace App\Builders;

use JustSteveKing\UriBuilder\Uri;

final class RedirectBuilder
{
    public function build(string $url, array $parameters = [], bool $useParameters = false, bool $includeUtm = false): string
    {
        $path = Uri::fromString(
            uri: $url,
        );

        if ($useParameters) {
            foreach ($parameters as $key => $value) {
                $path->addQueryParam(
                    key: $key,
                    value: $value,
                );
            }
        }

        if ($includeUtm) {
            $path->addQueryParam(
                key: 'utm_campaign',
                value: 'shortener',
            )->addQueryParam(
                key: 'utm_source',
                value: 'url_shortener',
            )->addQueryParam(
                key: 'utm_source',
                value: 'shorten.er',
            );
        }

        return $path->toString();
    }
}
