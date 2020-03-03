<?php


namespace App\Repositories;


use App\DataAccess\Eloquent\Entry;

class EntryRepository implements EntryRepositoryInterface
{
    /**
     * @var Entry
     */
    private $eloquent;

    public function __construct(Entry $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function save(array $params)
    {
        $attributes['id'] = (isset($params['id'])) ? $params['id'] : null;
        return $this->eloquent->updateOrCreate($attributes, $params);
    }
}
