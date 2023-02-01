<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\View;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

/**
 * @mixin View
 */
final class ViewResource extends JsonApiResource
{
    public function toAttributes(Request $request): array
    {
        return [
            'user_agent' => $this->user_agent->toArray(),
        ];
    }
}
