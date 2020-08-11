<?php
namespace EnergyHub\ApiClient;

use EnergyHub\ApiClient\Endpoints\AdsEndpoint;
use EnergyHub\ApiClient\Endpoints\PagesEndpoint;
use EnergyHub\ApiClient\Endpoints\TagsEndpoint;
use GuzzleHttp\Client as GuzzleClient;
use EnergyHub\ApiClient\Endpoints\ArticlesEndpoint;
use EnergyHub\ApiClient\Endpoints\EventsEndpoint;
use EnergyHub\ApiClient\Endpoints\SettingsEndpoint;
use EnergyHub\ApiClient\Endpoints\UsersEndpoint;

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

        return new Client(
            new ArticlesEndpoint($httpRequest),
            new EventsEndpoint($httpRequest),
            new UsersEndpoint($httpRequest),
            new SettingsEndpoint($httpRequest),
            new TagsEndpoint($httpRequest),
            new AdsEndpoint($httpRequest),
            new PagesEndpoint($httpRequest)
        );
    }
}
