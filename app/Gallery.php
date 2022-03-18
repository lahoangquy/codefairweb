<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];


    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * @return string
     */
    public function statusText(): string
    {
        return $this->status ? 'Enable' : 'Disabled';
    }
}
