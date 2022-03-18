<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public const SPONSOR_TYPES = [
        'bronze' => 'Bronze',
        'silver' => 'Silver',
        'gold' => 'Gold',
        'platinum' => 'Platinum',
    ];

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeSponsorText(): string
    {
        return $this->type ? self::SPONSOR_TYPES[$this->type] : 'Bronze';
    }

    /**
     * @return string
     */
    public function statusText(): string
    {
        return $this->status ? 'Enable' : 'Disabled';
    }
}
