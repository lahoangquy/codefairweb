<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificEvent extends Model
{
    protected $guarded = [];

    public function getScheduleAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setScheduleAttribute($value)
    {
        return $this->attributes['schedule'] = json_encode($value);
    }
}
