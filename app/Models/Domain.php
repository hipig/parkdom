<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'logo',
        'estimated_price',
        'currency',
        'suffix',
        'length',
        'age',
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

    public function priceCurrency()
    {
        return $this->hasOne(Currency::class, 'code', 'currency');
    }
}
