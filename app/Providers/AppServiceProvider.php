<?php

namespace App\Providers;

use App\Projectors\VisitProjector;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Projectionist::addProjector(VisitProjector::class);
    }
}
