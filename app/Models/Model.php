<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use HasFactory;

    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 2;
    public static $statusMap = [
        self::STATUS_ENABLE => 'Enable',
        self::STATUS_DISABLE => 'Disable'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }
}
