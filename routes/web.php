<?php

declare(strict_types=1);

use App\Http\Controllers\Web\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '{hash}',
    VisitController::class,
)->name('visit');
