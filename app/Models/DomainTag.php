<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'name',
    ];
}
