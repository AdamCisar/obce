<?php

namespace App\Providers;

use App\Contracts\GeocoderContract;
use App\Imports\CityImporter;
use App\Imports\GeocodeImporter;
use App\Services\Geocoding\NominatimGeocoder;
use Illuminate\Support\ServiceProvider;

class ImportServiceProvider extends ServiceProvider
{
    public $bindings = [
        GeocoderContract::class => NominatimGeocoder::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('geocode', GeocodeImporter::class);
        $this->app->bind('cities', CityImporter::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
