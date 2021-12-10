<?php


namespace App\Traits\Models;


use App\Models\Model;

trait StatusScope
{
    public function scopeEnable($query)
    {
        return $query->where('status', Model::STATUS_ENABLE);
    }

    public function scopeDisable($query)
    {
        return $query->where('status', Model::STATUS_DISABLE);
    }
}
