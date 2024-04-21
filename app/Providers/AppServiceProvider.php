<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('searchAll', function(array $fields, string $phrase) {
            return $phrase ? $this->whereAny($fields, 'LIKE', "%{$phrase}%") : $this;
        });
    }
}
