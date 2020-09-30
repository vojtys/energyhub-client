<?php
namespace EnergyHub\ApiClient\Endpoints;

class PasswordsEndpoint extends BaseEndpoint
{
    protected $endpoint = 'passwords';

	/**
	 * @throws \EnergyHub\ApiClient\Exception
	 */
    public function sendRequest(string $email, string $url): void
    {
        $email = base64_encode($email);
        $url = base64_encode($url);

        $this->httpRequest->post(
            $this->endpoint . '/request',
            $this->endpoint,
            [
                'email' => $email,
                'url' => $url,
            ]
        );
    }

	/**
	 * @throws \EnergyHub\ApiClient\Exception
	 */
    public function reset(string $token): void
    {
        $this->httpRequest->post(
            $this->endpoint . '/reset',
            $this->endpoint,
            [
                'token' => $token,
            ]
        );
    }
}
