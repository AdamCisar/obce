<?php

namespace App\Providers;

use App\Contracts\GeocoderContract;
use App\Services\Geocoding\NominatimGeocoder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GeocoderContract::class, NominatimGeocoder::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
