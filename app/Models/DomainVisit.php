<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainVisit extends Model
{
    use HasFactory;

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

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id', 'id');
    }
}
