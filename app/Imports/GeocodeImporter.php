<?php
declare(strict_types=1);

namespace App\Imports;

use App\Contracts\GeocoderContract;
use App\Contracts\ImportContract;
use App\Jobs\GeocodeCityJob;
use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Config\Repository as Config;

readonly class GeocodeImporter implements ImportContract {

    private Collection $cities;

    public function __construct(
        private City $cityModel, 
        private Client $client,
        private GeocoderContract $geocoder,
        private Config $config
    ) {}

    public function import(): void 
    {
       $this->prepare();
       $this->process();
    }
    
    private function process(): void 
    {
        $this->cities->each($this->save(...));
    }

    private function prepare(): void
    {
        $this->loadData();
        $isQueue = $this->config->get('import.use_queue');

        foreach ($this->cities as $city) {

            if ($isQueue) {
                $this->dispatch($city);
                continue;
            }

            [$city->latitude, $city->longitude] = $this->getLocation($city);
        }
    }

    public function dispatch(City $city): void 
    {
        GeocodeCityJob::dispatch($city);
    }

    public function processDispatched(City $city): void
    {
        [$city->latitude, $city->longitude] = $this->getLocation($city);
        $this->save($city);
    }

    public function getLocation(City $city): array 
    {
        return $this->geocoder->geocode($city->city_hall_address . ', ' . $city->name);
    }

    public function save(City $city): void 
    {
        $city->save();
    }

    private function loadData(): void
    {
        $this->cities = $this->cityModel->all();
    }
}