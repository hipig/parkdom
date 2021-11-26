<?php


namespace App\Services;


use App\Events\DomainCreated;
use App\Events\DomainVisited;
use App\Models\Domain;
use App\Models\DomainVisit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Jenssegers\Agent\Agent;

class DomainService
{
    /**
     * 现有的域名后缀
     * @var string[]
     */
    protected $domainSuffix = [
        'al', 'dz', 'af', 'ar', 'ae', 'aw', 'om', 'az', 'eg', 'et', 'ie', 'ee', 'ad', 'ao', 'ai', 'ag', 'at', 'au', 'mo',
        'bb', 'pg', 'bs', 'pk', 'py', 'ps', 'bh', 'pa', 'br', 'by', 'bm', 'bg', 'mp', 'bj', 'be', 'is', 'pr', 'ba', 'pl',
        'bo', 'bz', 'bw', 'bt', 'bf', 'bi', 'bv', 'kp', 'gq', 'dk', 'de', 'tl', 'tp', 'tg', 'dm', 'do', 'ru', 'ec', 'er',
        'fr', 'fo', 'pf', 'gf', 'tf', 'va', 'ph', 'fj', 'fi', 'cv', 'fk', 'gm', 'cg', 'cd', 'co', 'cr', 'gg', 'gd', 'gl',
        'ge', 'cu', 'gp', 'gu', 'gy', 'kz', 'ht', 'kr', 'nl', 'an', 'hm', 'hn', 'ki', 'dj', 'kg', 'gn', 'gw', 'ca', 'gh',
        'ga', 'kh', 'cz', 'zw', 'cm', 'qa', 'ky', 'km', 'ci', 'kw', 'cc', 'hr', 'ke', 'ck', 'lv', 'ls', 'la', 'lb', 'lt',
        'lr', 'ly', 'li', 're', 'lu', 'rw', 'ro', 'mg', 'im', 'mv', 'mt', 'mw', 'my', 'ml', 'mk', 'mh', 'mq', 'yt', 'mu',
        'mr', 'us', 'um', 'as', 'vi', 'mn', 'ms', 'bd', 'pe', 'fm', 'mm', 'md', 'ma', 'mc', 'mz', 'mx', 'nr', 'np', 'ni',
        'ne', 'ng', 'nu', 'no', 'nf', 'na', 'za', 'aq', 'gs', 'eu', 'pw', 'pn', 'pt', 'jp', 'se', 'ch', 'sv', 'ws', 'yu',
        'sl', 'sn', 'cy', 'sc', 'sa', 'cx', 'st', 'sh', 'kn', 'lc', 'sm', 'pm', 'vc', 'lk', 'sk', 'si', 'sj', 'sz', 'sd',
        'sr', 'sb', 'so', 'tj', 'tw', 'th', 'tz', 'to', 'tc', 'tt', 'tn', 'tv', 'tr', 'tm', 'tk', 'wf', 'vu', 'gt', 've',
        'bn', 'ug', 'ua', 'uy', 'uz', 'es', 'eh', 'gr', 'hk', 'sg', 'nc', 'nz', 'hu', 'sy', 'jm', 'am', 'ac', 'ye', 'iq',
        'ir', 'il', 'it', 'in', 'id', 'uk', 'vg', 'io', 'jo', 'vn', 'zm', 'je', 'td', 'gi', 'cl', 'cf', 'cn', 'yr', 'com',
        'arpa', 'edu', 'gov', 'int', 'mil', 'net', 'org', 'biz', 'info', 'pro', 'name', 'museum', 'coop', 'aero', 'xxx',
        'idv', 'me', 'mobi', 'asia', 'ax', 'bl', 'bq', 'cat', 'cw', 'gb', 'jobs', 'mf', 'rs', 'su', 'sx', 'tel', 'travel',
    ];

    /**
     * 判断域名是否为主域名
     * @param $host
     * @return bool
     * @author zhujiapeng
     * @date 2021/11/13
     */
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

        $appDomain = $this->parseHost($appHost, 'domain');
        $domain = $this->parseHost($host, 'domain');

        return $domain === $appDomain;
    }

    /**
     * 保存域名
     * @param $host
     * @param $ip
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     * @author zhujiapeng
     * @date 2021/11/13
     */
    public function storeDomain($host, $ip)
    {
        $domainInfo = $this->parseHost($host);

        try {
            $domain = Domain::query()->where('domain', $domainInfo->get('domain'))->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $domain = Domain::create($domainInfo->only('domain', 'suffix', 'length')->toArray());

            event(new DomainCreated($domain));
        }

        event(new DomainVisited($domain, $host, $ip));

        return $domain;
    }

    /**
     * 保存域名访问记录
     * @param $host
     * @param $ip
     * @return mixed
     * @throws \Exception
     */
    public function recordVisit($domain, $host, $ip)
    {
        $agent = new Agent();
        $platform = $agent->platform();
        $platformVersion = $agent->version($platform);
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);
        $location = geoip($ip);

        $visit = DomainVisit::create([
            'host' => $host,
            'ip' => $ip,
            'country_code' => $location->iso_code,
            'country' => $location->country,
            'device' => $agent->device(),
            'device_type' => $agent->deviceType(),
            'platform' => $platform,
            'platform_version' => $platformVersion,
            'browser' => $browser,
            'browser_version' => $browserVersion,
        ]);
        $visit->domain()->associate($domain);
        $visit->save();

        return $visit;
    }

    /**
     * 解析域名
     * @param $host
     * @param null $type
     * @return \Illuminate\Support\Collection|mixed|string
     * @throws \Exception
     * @author zhujiapeng
     * @date 2021/11/13
     */
    public function parseHost($host, $type = null)
    {
        $hostArr = explode('.', $host);
        $hostCount = count($hostArr);

        if ($hostCount < 2) {
            throw new \Exception('Host 格式不正确！');
        }

        $firstSuffix = array_pop($hostArr);
        $secondSuffix = array_pop($hostArr);
        $thirdSuffix = array_pop($hostArr);

        $domain = $host;
        $suffix = '.' . $firstSuffix;
        $length = strlen($secondSuffix);

        if ($hostCount > 2) {
            $domain = implode('.', [$secondSuffix, $firstSuffix]);
            $length = strlen($thirdSuffix);

            if(in_array($secondSuffix, $this->domainSuffix)){
                $domain = implode('.', [$thirdSuffix, $secondSuffix, $firstSuffix]);
                $suffix = '.' . $secondSuffix . '.' . $firstSuffix;
                $length = strlen($thirdSuffix);
            }
        }

        $domain = strtolower($domain);
        $host = strtolower($host);
        $suffix = strtolower($suffix);

        $hostInfo = compact('domain', 'host', 'suffix', 'length');

        return is_null($type) ? collect($hostInfo) : $hostInfo[$type] ?? '';
    }
}
