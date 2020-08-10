<?php
namespace EnergyHub;

use EnergyHub\Endpoints\AdsEndpoint;
use EnergyHub\Endpoints\PagesEndpoint;
use EnergyHub\Endpoints\TagsEndpoint;
use GuzzleHttp\Client as GuzzleClient;
use EnergyHub\Endpoints\ArticlesEndpoint;
use EnergyHub\Endpoints\EventsEndpoint;
use EnergyHub\Endpoints\SettingsEndpoint;
use EnergyHub\Endpoints\UsersEndpoint;

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
