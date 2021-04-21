<?php
namespace EnergyHub\ApiClient\Tests;

use EnergyHub\ApiClient\HttpRequest;
use EnergyHub\ApiClient\Client as ApiClient;
use GuzzleHttp\Client;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
	use MockeryPHPUnitIntegration;

	protected const API_URL = 'https://apiUrl.test';

	protected Client|MockInterface $client;

	protected HttpRequest $httpRequest;

	protected ApiClient $apiClient;

	public function setUp(): void
	{
		parent::setUp();

		$this->client = Mockery::mock(Client::class);
		$this->httpRequest = new HttpRequest($this->client, self::API_URL, 'xxx');
		$this->apiClient = new ApiClient($this->httpRequest);
	}

	public function tearDown(): void
	{
		parent::tearDown();

		Mockery::close();
	}
}
