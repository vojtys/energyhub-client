<?php
namespace EnergyHub\ApiClient\Endpoints;

class TagsEndpoint extends BaseEndpoint
{
    protected string $endpoint = 'tags';

    /**
     * @param string[] $values
     */
    public function sort(array $values): static
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
