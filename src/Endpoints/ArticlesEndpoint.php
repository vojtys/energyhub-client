<?php
namespace EnergyHub\ApiClient\Endpoints;

class ArticlesEndpoint extends BaseEndpoint
{
    public const CATEGORY_NEWS = 1;
    public const CATEGORY_TOPIC = 3;
    public const CATEGORY_PRO_ENERGY = 4;
    public const CATEGORY_PR = 5;
    public const CATEGORY_CTK = 6;

    public const IMPORTANT = 1;
    public const NOT_IMPORTANT = 0;

    protected $endpoint = 'articles';
}
