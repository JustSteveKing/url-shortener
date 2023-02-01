<?php

declare(strict_types=1);

namespace App\Http\Requests\API\Entries;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => [
                'required',
                'url',
                Rule::unique(
                    table: 'entries',
                    column: 'url',
                ),
                'max:500',
            ],
            'include_utm' => [
                'nullable',
                'boolean',
            ],
            'forward_parameters' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}
