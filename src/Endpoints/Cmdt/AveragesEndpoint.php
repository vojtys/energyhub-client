<?php

namespace EnergyHub\ApiClient\Endpoints\Cmdt;

use EnergyHub\ApiClient\Endpoints\BaseEndpoint;

class AveragesEndpoint extends BaseEndpoint
{
	public const PERIOD_MONTHLY = 'monthly';
	public const PERIOD_DAILY = 'daily';

	protected string $endpoint = 'cmdt/averages';
}
