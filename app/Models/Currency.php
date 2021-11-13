<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'prefix',
        'status',
    ];
}
