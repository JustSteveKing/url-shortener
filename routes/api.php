<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('entries')->as('entries:')->group(
    base_path('routes/api/entries.php'),
);
