<?php
namespace EnergyHub\Endpoints;

use EnergyHub\EnergyHubClientException;
use Psr\Http\Message\ResponseInterface;

class AdsEndpoint extends BaseEndpoint
{
    protected $endpoint = 'ads';

    /**
     * @return ResponseInterface
     * @throws EnergyHubClientException
     */
    public function hit(): ResponseInterface
    {
        if (empty($this->id)) {
            throw new EnergyHubClientException('ID is no set!');
        }

        return $this->httpRequest->patch(
            $this->buildEndpointUrl() . '/hit',
            $this->endpoint,
            $this->id,
            []
        );
    }
}
