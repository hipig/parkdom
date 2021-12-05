<?php

namespace App\ModelFilters\Admin;

use EloquentFilter\ModelFilter;

class DomainVisitFilter extends ModelFilter
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
        $this->where('host', 'like', "%$keyword%")
            ->orWhere('ip', 'like', "%$keyword%");
    }

    public function device($device)
    {
        $this->where('device', $device);
    }

    public function platform($platform)
    {
        $this->where('platform', $platform);
    }

    public function browser($browser)
    {
        $this->where('browser', $browser);
    }
}
