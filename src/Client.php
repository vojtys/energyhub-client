<?php
namespace EnergyHub\ApiClient;

use EnergyHub\ApiClient\Endpoints\AdsEndpoint;
use EnergyHub\ApiClient\Endpoints\ArticlesEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\CommoditiesEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\DataEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\PeaksEndpoint;
use EnergyHub\ApiClient\Endpoints\Cmdt\TrendsEndpoint;
use EnergyHub\ApiClient\Endpoints\EventsEndpoint;
use EnergyHub\ApiClient\Endpoints\PagesEndpoint;
use EnergyHub\ApiClient\Endpoints\SettingsEndpoint;
use EnergyHub\ApiClient\Endpoints\TagsEndpoint;
use EnergyHub\ApiClient\Endpoints\UsersEndpoint;

class Client
{
    /** @var ArticlesEndpoint */
    private $articlesEndpoint;

    /** @var EventsEndpoint */
    private $eventsEndpoint;

    /** @var UsersEndpoint */
    private $usersEndpoint;

    /** @var SettingsEndpoint */
    private $settingsEndpoint;

    /** @var TagsEndpoint */
    private $tagsEndpoint;

    /** @var AdsEndpoint */
    private $adsEndpoint;

    /** @var PagesEndpoint */
    private $pagesEndpoint;

	/** @var CommoditiesEndpoint */
	private $commoditiesEndpoint;

	/** @var DataEndpoint */
	private $dataEndpoint;

	/** @var PeaksEndpoint */
	private $peaksEndpoint;

	/** @var TrendsEndpoint */
	private $trendsEndpoint;

    public function __construct(
        ArticlesEndpoint $articlesEndpoint,
        EventsEndpoint $eventsEndpoint,
        UsersEndpoint $usersEndpoint,
        SettingsEndpoint $settingsEndpoint,
        TagsEndpoint $tagsEndpoint,
        AdsEndpoint $adsEndpoint,
        PagesEndpoint $pagesEndpoint,
		CommoditiesEndpoint $commoditiesEndpoint,
        DataEndpoint $dataEndpoint,
        PeaksEndpoint $peaksEndpoint,
		TrendsEndpoint $trendsEndpoint
	) {
        $this->articlesEndpoint = $articlesEndpoint;
        $this->eventsEndpoint = $eventsEndpoint;
        $this->usersEndpoint = $usersEndpoint;
        $this->settingsEndpoint = $settingsEndpoint;
        $this->tagsEndpoint = $tagsEndpoint;
        $this->adsEndpoint = $adsEndpoint;
        $this->pagesEndpoint = $pagesEndpoint;
		$this->commoditiesEndpoint = $commoditiesEndpoint;
		$this->dataEndpoint = $dataEndpoint;
		$this->peaksEndpoint = $peaksEndpoint;
		$this->trendsEndpoint = $trendsEndpoint;
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
}
