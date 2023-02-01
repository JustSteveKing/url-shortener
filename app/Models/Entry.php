<?php

declare(strict_types=1);

namespace App\Models;

use Bvtterfly\LaravelHashids\HasHashId;
use Bvtterfly\LaravelHashids\HashIdOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Entry extends Model
{
    use HasFactory;
    use HasHashId;
    use SoftDeletes;

    protected $fillable = [
        'hash',
        'url',
        'include_utm',
        'forward_params',
        'view_count',
    ];

    protected $casts = [
        'include_utm' => 'boolean',
        'forward_params' => 'boolean',
    ];

    public function views(): HasMany
    {
        return $this->hasMany(
            related: View::class,
            foreignKey: 'entry_id',
        );
    }

    public function getHashIdOptions(): HashIdOptions
    {
        return HashIdOptions::create()
            ->setMinimumHashLength(
                minHashLength: 5,
            )
            ->saveHashIdTo(
                fieldName: 'hash',
            );
    }
}
