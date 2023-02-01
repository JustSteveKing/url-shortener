<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Entry;
use TiMacDonald\JsonApi\JsonApiResource;

/**
 * @mixin Entry
 */
final class EntryResource extends JsonApiResource
{
    public array $attributes = [
        'url',
        'include_utm',
        'forward_parameters',
        'view_count' => 'views',
    ];
}
