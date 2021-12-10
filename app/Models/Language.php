<?php

namespace App\Models;

use App\Traits\Models\StatusScope;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory, Filterable, StatusScope;

    protected $fillable = [
        'code',
        'name',
        'direction',
        'status',
    ];

    protected $casts = [
        'default' => 'boolean',
    ];

    public function setDefault($default)
    {
        if ($default) {
            static::query()->whereKeyNot($this->id)->update(['default' => false]);
            $this->default = true;
            $this->save();
        }
    }
}
