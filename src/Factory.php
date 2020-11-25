<?php
namespace EnergyHub\ApiClient;

use EnergyHub\ApiClient\Endpoints\AdsEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\CommoditiesEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\DataEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\PeaksEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\TrendsEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\UnitsEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\ValueTypesEndpoint;
use EnergyHub\ApiClient\Endpoints\PagesEndpoint;
use EnergyHub\ApiClient\Endpoints\PasswordsEndpoint;
use EnergyHub\ApiClient\Endpoints\TagsEndpoint;
use EnergyHub\ApiClient\Endpoints\ArticlesEndpoint;
use EnergyHub\ApiClient\Endpoints\EventsEndpoint;
use EnergyHub\ApiClient\Endpoints\SettingsEndpoint;
use EnergyHub\ApiClient\Endpoints\UsersEndpoint;
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

        return new Client(
            new ArticlesEndpoint($httpRequest),
            new EventsEndpoint($httpRequest),
            new UsersEndpoint($httpRequest),
            new SettingsEndpoint($httpRequest),
            new TagsEndpoint($httpRequest),
            new AdsEndpoint($httpRequest),
            new PagesEndpoint($httpRequest),
			new CommoditiesEndpoint($httpRequest),
			new DataEndpoint($httpRequest),
			new PeaksEndpoint($httpRequest),
			new TrendsEndpoint($httpRequest),
			new PasswordsEndpoint($httpRequest),
			new UnitsEndpoint($httpRequest),
			new ValueTypesEndpoint($httpRequest)
        );
    }
}
