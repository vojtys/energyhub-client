<?php

namespace EnergyHub\ApiClient\Endpoints;

use EnergyHub\ApiClient\Exception;

class UserActivationEndpoint extends BaseEndpoint
{
	protected string $endpoint = 'user/activation';

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

	public function activate(string $id): void
	{
		$this->httpRequest->post(
			$this->endpoint . '/activate',
			$this->endpoint,
			[
				'id' => $id,
			]
		);
	}
}