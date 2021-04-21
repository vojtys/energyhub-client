<?php
namespace EnergyHub\ApiClient;

use GuzzleHttp\Client as GuzzleClient;

class Factory
{
    public static function create(string $apiUrl, string $apiKey): Client
    {
        $guzzleClient = new GuzzleClient([
            'headers' => [
                'Content-Type' => 'application/vnd.api+json',
                'Accept' => 'application/vnd.api+json',
                'X-Api-Key' => $apiKey,
            ],
        ]);

        $httpRequest = new HttpRequest($guzzleClient, $apiUrl, $apiKey);

        return new Client($httpRequest);
    }
}
