<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainVisit extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'domain_id',
        'host',
        'ip',
        'country',
        'country_code',
        'device',
        'device_type',
        'platform',
        'platform_version',
        'browser',
        'browser_version',
    ];

    protected static function booted()
    {
        static::updating(function ($visit) {
            $location = geoip($visit->ip);
            $visit->country_code = $location->iso_code;
            $visit->country = $location->country;
        });
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id', 'id');
    }
}
