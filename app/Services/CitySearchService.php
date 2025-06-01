<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\City;

readonly class CitySearchService
{
    public function __construct(private City $city) {}    

    public function search(string $query): array
    {
        return $this->city->where('name', 'like', '%' . $query . '%')
            ->get(['id', 'name'])
            ->each(function ($city) {
                $city->url = route('cities.show', ['city' => $city->id]);
            })
            ->toArray();
    }
}
