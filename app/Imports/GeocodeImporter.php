<?php
declare(strict_types=1);

namespace App\Imports;

use App\Contracts\GeocoderContract;
use App\Contracts\ImportContract;
use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;

readonly class GeocodeImporter implements ImportContract {

    private Collection $cities;

    public function __construct(
        private City $cityModel, 
        private Client $client,
        private GeocoderContract $geocoder,
        ) {}

    public function import(): void 
    {
       $this->prepare();
       $this->process();
    }
    
    private function process(): void 
    {
        $this->cities->each->save();
    }

    private function prepare(): void
    {
        $this->loadData();

        foreach ($this->cities as $city) {
            [$city->latitude, $city->longitude] = $this->getLocation($city->city_hall_address . ', ' . $city->name);
        }
    }

    private function getLocation(string $address): array 
    {
        return $this->geocoder->geocode($address);
    }

    private function loadData(): void
    {
        $this->cities = $this->cityModel->all();
    }
}