<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
}
