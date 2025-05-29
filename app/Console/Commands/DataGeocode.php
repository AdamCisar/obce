<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DataGeocode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Geocode all cities based on their address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Forwarding call to data:import geocode');

        $this->call('data:import', [
            'importer' => 'geocode',
            '--config' => 'services.locationiq'
        ]);

    }
}
