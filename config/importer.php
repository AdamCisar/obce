<?php

use App\Imports\CityImporter;
use App\Imports\GeocodeImporter;

return [
    'cities' => CityImporter::class,
    'geocode' => GeocodeImporter::class
];
