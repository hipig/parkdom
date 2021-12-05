<?php

namespace App\Models;

use App\Settings\DomainSetting;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Domain extends Model
{
    use HasFactory, Filterable, HasTranslations;

    protected $fillable = [
        'domain',
        'logo',
        'price',
        'min_price',
        'currency',
        'suffix',
        'allow_offer',
        'length',
        'age',
        'tags',
        'description',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];

    protected $dates = [
        'last_updated_at'
    ];

    protected $with = [
        'priceCurrency'
    ];

    protected $translatable = [
        'description',
    ];

    protected static function booted()
    {
        static::creating(function ($domain) {
            $domainInfo = parseHost($domain->domain);
            $domain->suffix = $domainInfo->get('suffix');
            $domain->length = $domainInfo->get('length');
        });
    }

    public function category()
    {
        return $this->belongsTo(DomainCategory::class, 'category_id', 'id');
    }

    public function priceCurrency()
    {
        return $this->hasOne(Currency::class, 'code', 'currency');
    }

    public function getUrlAttribute()
    {
        return 'http://' . $this->domain;
    }

    public function getFormatPriceAttribute()
    {
        return $this->price ? optional($this->priceCurrency)->prefix.$this->price : $this->price;
    }

    public function getFormatMinPriceAttribute()
    {
        return $this->min_price ? optional($this->priceCurrency)->prefix.$this->min_price : $this->min_price;
    }

    public function incrementHit()
    {
        $hit = DomainHit::firstOrCreate([
            'date' => now()->format('Y-m-d')
        ]);
        $hit->domain()->associate($this);
        $hit->increment('times');
        $hit->save();
    }

    public function createVisit($host, $ip)
    {
        $agent = app('agent');
        $platform = $agent->platform();
        $platformVersion = $agent->version($platform);
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);


        $visit = DomainVisit::create([
            'host' => $host,
            'ip' => $ip,
            'device' => $agent->device(),
            'device_type' => $agent->deviceType(),
            'platform' => $platform,
            'platform_version' => $platformVersion,
            'browser' => $browser,
            'browser_version' => $browserVersion,
        ]);
        $visit->domain()->associate($this);
        $visit->save();
    }

    public function isAllowOffer()
    {
        return $this->allow_offer == self::STATUS_ENABLE;
    }

    public function getMinPrice()
    {
        return $this->min_price ?? app(DomainSetting::class)->min_price ?? 0;
    }
}
