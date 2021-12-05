<?php

namespace App\ModelFilters\Admin;

use EloquentFilter\ModelFilter;

class OfferFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function domain($domain)
    {
        $this->where('domain_id', $domain);
    }

    public function keyword($keyword)
    {
        $this->where('name', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->orWhere('phone', 'like', "%$keyword%");
    }
}
