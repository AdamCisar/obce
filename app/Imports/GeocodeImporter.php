<?php
declare(strict_types=1);

namespace App\Imports;

use App\Contracts\ImportContract;
use App\Exceptions\ImportFailedException;
use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Sleep;

readonly class GeocodeImporter implements ImportContract {

    private Collection $cities;

    public function __construct(private City $cityModel, private Client $client, private array $config) {}

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
        if (empty($this->config['api_key'])) {
            throw new ImportFailedException('LocationIQ API key not found');
        }

        $this->loadData();

        foreach ($this->cities as $city) {
            [$city->latitude, $city->longitude] = $this->getLocation($city->city_hall_address);
        }
    }

    private function getLocation(string $address): array 
    {
        try {
            $response = $this->client->get('https://us1.locationiq.com/v1/search.php', [
                    'query' => [
                        'key' => $this->config['api_key'],
                        'q' => $address,
                        'format' => 'json',
                        'limit' => 1,
                    ],
                    'headers' => [
                        'User-Agent' => 'LaravelGeocoder/1.0 (+your-email@example.com)',
                    ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            
            // to avoid rate limits
            Sleep::for(1)->seconds();

        } catch (\Exception $e) {
            throw new ImportFailedException($e->getMessage());
        }

        return [(float)($data[0]['lat'] ?? 0), (float)($data[0]['lon'] ?? 0)];
    }

    private function loadData(): void
    {
        $this->cities = $this->cityModel->all();
    }
}