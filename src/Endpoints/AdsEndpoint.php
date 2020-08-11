<?php
namespace EnergyHub\ApiClient\Endpoints;

use EnergyHub\ApiClient\Exception;
use Psr\Http\Message\ResponseInterface;

class AdsEndpoint extends BaseEndpoint
{
    protected $endpoint = 'ads';

	/**
	 * @return ResponseInterface
	 * @throws Exception
	 */
    public function hit(): ResponseInterface
    {
        if (empty($this->id)) {
            throw new Exception('ID is no set!');
        }

        return $this->httpRequest->patch(
            $this->buildEndpointUrl() . '/hit',
            $this->endpoint,
            $this->id,
            []
        );
    }
}
