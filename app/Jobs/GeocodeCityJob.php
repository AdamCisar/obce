<?php

namespace App\Jobs;

use App\Imports\GeocodeImporter;
use App\Models\City;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GeocodeCityJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private City $city)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(GeocodeImporter $importer): void
    {
        $importer->processDispatched($this->city);
    }
}
