<?php

declare(strict_types=1);

use App\Http\Controllers\API\Entries\DeleteController;
use App\Http\Controllers\API\Entries\IndexController;
use App\Http\Controllers\API\Entries\ShowController;
use App\Http\Controllers\API\Entries\StoreController;
use App\Http\Controllers\API\Entries\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    IndexController::class,
)->name('index');

Route::post(
    '/',
    StoreController::class,
)->name('store');

Route::get(
    '{hash}',
    ShowController::class,
)->name('show');

Route::match(
    ['PUT', 'PATCH'],
    '{hash}',
    UpdateController::class
)->name('update');

Route::delete(
    '{hash}',
    DeleteController::class,
)->name('delete');
