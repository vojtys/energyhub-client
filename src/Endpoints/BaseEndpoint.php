<?php

namespace EnergyHub\ApiClient\Endpoints;

use EnergyHub\ApiClient\Exception;
use EnergyHub\ApiClient\HttpRequest;
use Psr\Http\Message\ResponseInterface;

abstract class BaseEndpoint
{
	protected HttpRequest $httpRequest;

	protected string $endpoint;

	protected int|null $id = null;

	protected array|null $filter = [];

	protected string|null $include = null;

	protected string|null $sort = null;

	protected array|null $page = null;

	public function __construct(HttpRequest $httpRequest)
	{
		$this->httpRequest = $httpRequest;
	}

	public function id(int $id): void
	{
		$this->id = $id;
	}

	public function filter(string $name, array $values): static
	{
		$this->filter[$name] = implode(',', $values);

		return $this;
	}

	public function include(array $values): static
	{
		$this->include = implode(',', $values);

		return $this;
	}

	public function sort(array $values): static
	{
		$this->sort = implode(',', $values);

		return $this;
	}

	public function pagination(int $pageNumber, int $pageSize): static
	{
		if (!$pageSize) {
			$pageSize = 10;
		}

		$this->page['number'] = $pageNumber;
		$this->page['size'] = $pageSize;

		return $this;
	}

	/**
	 * @throws Exception
	 */
	public function getOne(): array
	{
		$response = $this->httpRequest->get($this->buildEndpointUrl(), []);

		return $this->getResponseContent($response);
	}

	/**
	 * @throws Exception
	 */
	public function get(int $pageNumber = 1, int $pageSize = null): array
	{
		if (!$pageSize) {
			$pageSize = 10;
		}

		$this->pagination($pageNumber, $pageSize);

		$params = $this->prepareRequestParams();

		$response = $this->httpRequest->get($this->buildEndpointUrl(), [
			'query' => $params,
		]);

		return $this->getResponseContent($response);
	}

	/**
	 * @throws Exception
	 */
	public function first(): ?array
	{
		$responseContent = $this->get(1, 1);

		if (($this->isSingleItemResponse() && empty($responseContent['data']))
			|| (!$this->isSingleItemResponse() && empty($responseContent['data'][0]))
		) {
			return null;
		}

		if (!$this->isSingleItemResponse()) {
			$responseContent['data'] = collect($responseContent['data'])->shift();
		}

		return $responseContent;
	}

	/**
	 * @throws Exception
	 */
	public function all(): array
	{
		$params = $this->prepareRequestParams();

		$response = $this->httpRequest->get($this->buildEndpointUrl(), [
			'query' => $params,
		]);

		return $this->getResponseContent($response);
	}

	/**
	 * @throws Exception
	 */
	public function patch(array $data): array
	{
		$response = $this->httpRequest->patch(
			$this->buildEndpointUrl(),
			$this->endpoint,
			$this->id,
			$data
		);

		return $this->getResponseContent($response);
	}

	/**
	 * @throws Exception
	 */
	public function post(array $data): array
	{
		$response = $this->httpRequest->post(
			$this->buildEndpointUrl(),
			$this->endpoint,
			$data
		);

		return $this->getResponseContent($response);
	}

	protected function prepareRequestParams(): array
	{
		$params = [];

		if ($this->filter) {
			$params['filter'] = $this->filter;
		}

		if ($this->include) {
			$params['include'] = $this->include;
		}

		if (!empty($this->page)) {
			$params['page'] = $this->page;
		}

		if ($this->sort) {
			$params['sort'] = $this->sort;
		}

		return $params;
	}

	protected function buildEndpointUrl(): string
	{
		$id = !empty($this->id)
			? '/' . $this->id
			: '';

		return $this->endpoint . $id;
	}

	/**
	 * @throws Exception
	 */
	private function getResponseContent(ResponseInterface $response): array
	{
		$responseContent = $response->getBody()->getContents();

		if (empty($responseContent)) {
			return [];
		}

		try {
			return json_decode($responseContent, true);
		} catch (\Exception $e) {
			throw new Exception('Invalid JSON in response:' . $responseContent);
		}
	}

	private function isSingleItemResponse(): bool
	{
		return $this->id !== null;
	}
}
