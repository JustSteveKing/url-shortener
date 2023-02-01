<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\UserAgentCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_agent',
        'entry_id',
    ];

    protected $casts = [
        'user_agent' => UserAgentCast::class,
    ];

    public function entry(): BelongsTo
    {
        return $this->belongsTo(
            related: Entry::class,
            foreignKey: 'entry_id',
        );
    }
}
