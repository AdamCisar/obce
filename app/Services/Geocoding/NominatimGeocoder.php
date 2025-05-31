<?php

declare(strict_types=1);

namespace App\Services\Geocoding;

use App\Contracts\GeocoderContract;
use GuzzleHttp\Client;
use App\Exceptions\ImportFailedException;

class NominatimGeocoder implements GeocoderContract
{
    public function __construct(
        private Client $client
    ) {}    

    public function geocode(string $address): array
    {
        try {
            $response = $this->client->get('https://nominatim.openstreetmap.org/search', [
                 'headers' => [
                    'User-Agent' => 'Geolocate app',
                ],
                'query' => [
                    'q' => $address . ', Slovakia',
                    'format' => 'json',
                    'addressdetails' => 1,
                    'limit' => 1,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            return [(float)($data[0]['lat'] ?? 0), (float)($data[0]['lon'] ?? 0)];
        } catch (\Exception $e) {
            throw new ImportFailedException("Geocoding failed: " . $e->getMessage());
        }
    }
}
