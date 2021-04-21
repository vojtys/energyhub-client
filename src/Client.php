<?php
namespace EnergyHub\ApiClient;

use EnergyHub\ApiClient\Endpoints\AdsEndpoint;
use EnergyHub\ApiClient\Endpoints\ArticlesEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\CommoditiesEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\DataEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\PeaksEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\TrendsEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\UnitsEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\ValueTypesEndpoint;
use EnergyHub\ApiClient\Endpoints\EventsEndpoint;
use EnergyHub\ApiClient\Endpoints\PagesEndpoint;
use EnergyHub\ApiClient\Endpoints\PasswordsEndpoint;
use EnergyHub\ApiClient\Endpoints\SettingsEndpoint;
use EnergyHub\ApiClient\Endpoints\TagsEndpoint;
use EnergyHub\ApiClient\Endpoints\UsersEndpoint;
use JetBrains\PhpStorm\Pure;

class Client
{
    private ArticlesEndpoint $articlesEndpoint;

    private EventsEndpoint $eventsEndpoint;

    private UsersEndpoint $usersEndpoint;

    private SettingsEndpoint $settingsEndpoint;

    private TagsEndpoint $tagsEndpoint;

    private AdsEndpoint $adsEndpoint;

    private PagesEndpoint $pagesEndpoint;

	private CommoditiesEndpoint $commoditiesEndpoint;

	private DataEndpoint $dataEndpoint;

	private PeaksEndpoint $peaksEndpoint;

	private TrendsEndpoint $trendsEndpoint;

	private PasswordsEndpoint $passwordsEndpoint;

	private UnitsEndpoint $unitsEndpoint;

	private ValueTypesEndpoint $valueTypesEndpoint;

    #[Pure]
	public function __construct(HttpRequest $httpRequest)
	{
    	$this->articlesEndpoint = new ArticlesEndpoint($httpRequest);
        $this->eventsEndpoint = new EventsEndpoint($httpRequest);
        $this->usersEndpoint = new UsersEndpoint($httpRequest);
        $this->settingsEndpoint = new SettingsEndpoint($httpRequest);
        $this->tagsEndpoint = new TagsEndpoint($httpRequest);
        $this->adsEndpoint = new AdsEndpoint($httpRequest);
        $this->pagesEndpoint = new PagesEndpoint($httpRequest);
        $this->commoditiesEndpoint = new CommoditiesEndpoint($httpRequest);
		$this->dataEndpoint = new DataEndpoint($httpRequest);
		$this->peaksEndpoint = new PeaksEndpoint($httpRequest);
		$this->trendsEndpoint =	new TrendsEndpoint($httpRequest);
		$this->passwordsEndpoint = new PasswordsEndpoint($httpRequest);
		$this->unitsEndpoint = new UnitsEndpoint($httpRequest);
		$this->valueTypesEndpoint = new ValueTypesEndpoint($httpRequest);
    }

    public function ads(int $id = null): AdsEndpoint
    {
        $adsEndpoint = clone $this->adsEndpoint;

        if ($id) {
            $adsEndpoint->id($id);
        }

        return $adsEndpoint;
    }

    public function articles(int $id = null): ArticlesEndpoint
    {
        $articlesEndpoint = clone $this->articlesEndpoint;

        if ($id) {
            $articlesEndpoint->id($id);
        }

        return $articlesEndpoint;
    }

    public function events(int $id = null): EventsEndpoint
    {
        $eventsEndpoint = clone $this->eventsEndpoint;

        if ($id) {
            $eventsEndpoint->id($id);
        }

        return $eventsEndpoint;
    }

    public function users(int $id = null): UsersEndpoint
    {
        $usersEndpoint = clone $this->usersEndpoint;

        if ($id) {
            $usersEndpoint->id($id);
        }

        return $usersEndpoint;
    }

    public function settings(int $id = null): SettingsEndpoint
    {
        $settingsEndpoint = clone $this->settingsEndpoint;

        if ($id) {
            $settingsEndpoint->id($id);
        }

        return $settingsEndpoint;
    }

    public function tags(int $id = null): TagsEndpoint
    {
        $tagsEndpoint = clone $this->tagsEndpoint;

        if ($id) {
            $tagsEndpoint->id($id);
        }

        return $tagsEndpoint;
    }

    public function pages(int $id = null): PagesEndpoint
    {
        $pagesEndpoint = clone $this->pagesEndpoint;

        if ($id) {
            $pagesEndpoint->id($id);
        }

        return $pagesEndpoint;
    }


	public function commodities(int $id = null): CommoditiesEndpoint
	{
		$commoditiesEndpoint = clone $this->commoditiesEndpoint;

		if ($id) {
			$commoditiesEndpoint->id($id);
		}

		return $commoditiesEndpoint;
	}

	public function data(int $id = null): DataEndpoint
	{
		$dataEndpoint = clone $this->dataEndpoint;

		if ($id) {
			$dataEndpoint->id($id);
		}

		return $dataEndpoint;
	}

	public function peaks(int $id = null): PeaksEndpoint
	{
		$peaksEndpoint = clone $this->peaksEndpoint;

		if ($id) {
			$peaksEndpoint->id($id);
		}

		return $peaksEndpoint;
	}

	public function trends(int $id = null): TrendsEndpoint
	{
		$trendsEndpoint = clone $this->trendsEndpoint;

		if ($id) {
			$trendsEndpoint->id($id);
		}

		return $trendsEndpoint;
	}

	public function units(int $id = null): UnitsEndpoint
	{
		$unitsEndpoint = clone $this->unitsEndpoint;

		if ($id) {
			$unitsEndpoint->id($id);
		}

		return $unitsEndpoint;
	}

	public function valueTypes(int $id = null): ValueTypesEndpoint
	{
		$valueTypesEndpoint = clone $this->valueTypesEndpoint;

		if ($id) {
			$valueTypesEndpoint->id($id);
		}

		return $valueTypesEndpoint;
	}

	public function passwords(): PasswordsEndpoint
	{
		return clone $this->passwordsEndpoint;
	}
}
