<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainCategory extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'icon',
        'sort',
        'status',
    ];

    public function domains()
    {
        return $this->hasMany(Domain::class, 'category_id', 'id');
    }
}
