<?php


namespace App\Services;


use App\Events\DomainCreated;
use App\Models\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DomainService
{
    public function isSameOfAppHost($host)
    {
        $appUrl = config('app.url');
        if (!$appUrl) {
            return false;
        }

        $appHost = parse_url($appUrl, PHP_URL_HOST) ?? '';
        if (!$appHost) {
            return false;
        }

        return $host === $appHost;
    }

    public function findOneByName($host)
    {
        $domain = Domain::query()->firstOrCreate([
            'name' => $host
        ]);

        event(new DomainCreated($domain));

        return $domain;
    }
}
