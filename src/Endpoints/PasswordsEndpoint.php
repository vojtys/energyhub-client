<?php

namespace EnergyHub\ApiClient\Endpoints;

use EnergyHub\ApiClient\Exception;

class PasswordsEndpoint extends BaseEndpoint
{
	protected string $endpoint = 'passwords';

	/**
	 * @throws Exception
	 */
	public function sendRequest(string $email, string $url): void
	{
		$this->httpRequest->post(
			$this->endpoint . '/request',
			$this->endpoint,
			[
				'email' => base64_encode($email),
				'url' => base64_encode($url),
			]
		);
	}

	/**
	 * @param string $token
	 * @throws Exception
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
