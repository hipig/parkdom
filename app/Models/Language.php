<?php

namespace App\Models;

use App\ModelTraits\StatusScope;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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
