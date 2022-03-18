<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function topic()
    {
        return $this->belongsTo(ResourceTopic::class);
    }
}
