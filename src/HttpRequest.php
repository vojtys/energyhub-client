<?php

namespace EnergyHub\ApiClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\ArrayShape;
use Psr\Http\Message\ResponseInterface;

class HttpRequest
{
	const HTTP_STATUS_OK = 200;
	const HTTP_STATUS_CREATED = 201;
	const HTTP_NO_CONTENT = 204;

	private GuzzleClient $httpClient;

	private string $apiUrl;

	private string $apiKey;

	public function __construct(GuzzleClient $httpClient, string $apiUrl, string $apiKey)
	{
		$this->httpClient = $httpClient;
		$this->apiUrl = $apiUrl;
		$this->apiKey = $apiKey;
	}

	/**
	 * @throws Exception
	 */
	public function get(string $endpoint, array $params): ?ResponseInterface
	{
		$response = null;

		try {
			$response = $this->httpClient->get(
				$this->endpointUrl($endpoint),
				$params
			);
		} catch (GuzzleException $e) {
			$this->handleGuzzleException($e);
		}

		return $response;
	}

	/**
	 * @throws Exception
	 */
	public function post(string $endpoint, string $type, array $body): ?ResponseInterface
	{
		$response = null;

		try {
			$response = $this->httpClient->post(
				$this->endpointUrl($endpoint),
				$this->requestContent($type, null, $body)
			);
		} catch (GuzzleException $e) {
			$this->handleGuzzleException($e);
		}

		return $response;
	}

	/**
	 * @throws Exception
	 */
	public function patch(string $endpoint, string $type, int $id, array $body): ?ResponseInterface
	{
		$response = null;

		try {
			$response = $this->httpClient->patch(
				$this->endpointUrl($endpoint),
				$this->requestContent($type, $id, $body)
			);
		} catch (GuzzleException $e) {
			$this->handleGuzzleException($e);
		}

		return $response;
	}

	/**
	 * @throws Exception
	 */
	public function delete(string $endpoint, string $type, int $id, array $body = null): ResponseInterface
	{
		$response = null;

		try {
			$response = $this->httpClient->delete(
				$this->endpointUrl($endpoint),
				$this->requestContent($type, $id, $body)
			);
		} catch (GuzzleException $e) {
			$this->handleGuzzleException($e);
		}

		return $response;
	}

	/**
	 * @throws Exception
	 */
	private function handleGuzzleException(GuzzleException $guzzleException): void
	{
		throw new Exception($guzzleException->getMessage(), $guzzleException->getCode());
	}

	private function endpointUrl(string $endpoint): string
	{
		return $this->apiUrl . '/' . $endpoint;
	}

	#[ArrayShape(['headers' => "string[]", 'json' => "array[]"])]
	private function requestContent(string $type, int $id = null, array $body = null): array
	{
		return [
			'headers' => $this->getRequestHeaders(),
			'json' => [
				'data' => [
					'id' => (string)$id,
					'type' => $type,
					'attributes' => $body,
				],
			],
		];
	}

	#[ArrayShape(['Content-Type' => "string", 'Accept' => "string", 'X-Api-Key' => "string"])]
	private function getRequestHeaders(): array
	{
		return [
			'Content-Type' => 'application/vnd.api+json',
			'Accept' => 'application/vnd.api+json',
			'X-Api-Key' => $this->apiKey,
		];
	}
}
