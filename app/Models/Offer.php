<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'name',
        'email',
        'phone',
        'offer_price',
        'ip',
        'country',
        'country_code',
        'content'
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id', 'id');
    }

    public function getFormatOfferPriceAttribute()
    {
        return $this->offer_price ? optional($this->domain->priceCurrency)->prefix.$this->offer_price : $this->offer_price;
    }
}
