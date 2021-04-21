<?php

namespace EnergyHub\ApiClient\Endpoints\Cmdt;

use EnergyHub\ApiClient\Endpoints\BaseEndpoint;

class TrendsEndpoint extends BaseEndpoint
{
	protected string $endpoint = 'cmdt/trends';

	public function latest(): TrendsEndpoint
	{
		$this->endpoint .= '/latest';

		return $this;
	}
}
