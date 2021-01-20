<?php
namespace EnergyHub\ApiClient\Endpoints\Cmdt;

use EnergyHub\ApiClient\Endpoints\BaseEndpoint;

class PeaksEndpoint extends BaseEndpoint
{
    protected $endpoint = 'cmdt/peaks';

	public function latest(): PeaksEndpoint
	{
		$this->endpoint .= '/latest';

		return $this;
	}
}
