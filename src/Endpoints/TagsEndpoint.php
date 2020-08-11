<?php
namespace EnergyHub\ApiClient\Endpoints;

class TagsEndpoint extends BaseEndpoint
{
    protected $endpoint = 'tags';

    /**
     * @param string[] $values
     * @return $this
     */
    public function sort(array $values)
    {
        $sort = collect($values)->map(function ($item) {
            if (($item === '-cs') || ($item === 'cs')) {
                return str_replace('cs', 'cz', $item);
            }

            return $item;
        })->toArray();

        return parent::sort($sort);
    }
}
