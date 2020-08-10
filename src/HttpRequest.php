<?php
namespace EnergyHub;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\TransferException;
use Psr\Http\Message\ResponseInterface;

class HttpRequest
{
    const HTTP_STATUS_OK = 200;
    const HTTP_STATUS_CREATED = 201;
    const HTTP_NO_CONTENT = 204;

    /** @var GuzzleClient $httpClient */
    private $httpClient;

    /** @var string $apiUrl */
    private $apiUrl;

    /** @var string $apiKey */
    private $apiKey;

    public function __construct(GuzzleClient $httpClient, string $apiUrl, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return ResponseInterface
     * @throws EnergyHubClientException
     */
    public function get(string $endpoint, array $params): ResponseInterface
    {
        try {
            return $this->httpClient->get(
                $this->endpointUrl($endpoint),
                $params
            );
        } catch (TransferException $e) {
            $this->handleException($e);
        }
    }

    /**
     * @param string $endpoint
     * @param string $type
     * @param array $body
     * @return ResponseInterface
     * @throws EnergyHubClientException
     */
    public function post(string $endpoint, string $type, array $body): ResponseInterface
    {
        try {
            return $this->httpClient->post(
                $this->endpointUrl($endpoint),
                $this->requestContent($type, null, $body)
            );
        } catch (TransferException $e) {
            $this->handleException($e);
        }
    }

    /**
     * @param string $endpoint
     * @param string $type
     * @param int $id
     * @param array $body
     * @return ResponseInterface
     * @throws EnergyHubClientException
     */
    public function patch(string $endpoint, string $type, int $id, array $body): ResponseInterface
    {
        try {
            return $this->httpClient->patch(
                $this->endpointUrl($endpoint),
                $this->requestContent($type, $id, $body)
            );
        } catch (TransferException $e) {
            $this->handleException($e);
        }
    }

    /**
     * @param string $endpoint
     * @param string $type
     * @param int $id
     * @param array|null $body
     * @return ResponseInterface
     * @throws EnergyHubClientException
     */
    public function delete(string $endpoint, string $type, int $id, array $body = null): ResponseInterface
    {
        try {
            return $this->httpClient->delete(
                $this->endpointUrl($endpoint),
                $this->requestContent($type, $id, $body)
            );
        } catch (TransferException $e) {
            $this->handleException($e);
        }
    }

    /**
     * @param TransferException $transferException
     * @throws EnergyHubClientException
     */
    private function handleException(TransferException $transferException): void
    {
        throw new EnergyHubClientException($transferException->getMessage(), $transferException->getCode());
    }

    private function endpointUrl(string $endpoint): string
    {
        return $this->apiUrl . '/' . $endpoint;
    }

    /**
     * @param string $type
     * @param int|null $id
     * @param array|null $body
     * @return array
     */
    private function requestContent(string $type, int $id = null, array $body = null): array
    {
        return [
            'headers' => $this->getRequestHeaders(),
            'json' => [
                'data' => [
                    'id' => (string) $id,
                    'type' => $type,
                    'attributes' => $body,
                ],
            ],
        ];
    }

    private function getRequestHeaders(): array
    {
        return [
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
            'X-Api-Key' => $this->apiKey,
        ];
    }
}
