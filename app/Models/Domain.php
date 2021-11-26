<?php

namespace App\Models;

use App\Services\DomainService;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory, Filterable;

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

    protected static function booted()
    {
        static::creating(function ($domain) {
            $domainInfo = (new DomainService())->parseHost($domain->domain);
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
}
