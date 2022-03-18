<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function getMetaKeyAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setMetaKeyAttribute($value)
    {
        return $this->attributes['meta_key'] = json_encode($value);
    }
}
