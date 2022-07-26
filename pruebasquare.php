<?php

require 'vendor/autoload.php';

use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;


$client = new SquareClient([
    'accessToken' => 'EAAAEF-M3bAr-zwtOOEsHI6Weo_LEd0HVQcNkawAQVrcdCYQeP805qhiYNFwFk8x',
    'environment' => Environment::SANDBOX,
]);

try {
    $locationsApi = $client->getLocationsApi();
    $apiResponse = $locationsApi->listLocations();

    if ($apiResponse->isSuccess()) {
        $listLocationsResponse = $apiResponse->getResult();
        $locationsList = $listLocationsResponse->getLocations();
        foreach ($locationsList as $location) {
        print_r($location);
        }
    } else {
        print_r($apiResponse->getErrors());
    }
} catch (ApiException $e) {
    print_r("Recieved error while calling Square: " . $e->getMessage());
} 