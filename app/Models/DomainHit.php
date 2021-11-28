<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainHit extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'date',
        'times',
    ];

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id', 'id');
    }
}
