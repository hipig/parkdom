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
        'currency',
        'content'
    ];
}
