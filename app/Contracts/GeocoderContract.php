<?php

namespace App\Contracts;

interface GeocoderContract
{
    public function geocode(string $address): array;
}
