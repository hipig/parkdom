<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'code',
        'name',
        'direction',
        'default',
        'status',
    ];

    protected $casts = [
        'default' => 'boolean',
    ];

    public function setDefault($default)
    {
        if ($default) {
            self::update(['default' => false]);
            $this->default = true;
            $this->save();
        }
    }
}
