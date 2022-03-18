<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceTopic extends Model
{
    protected $guarded = [];

    public function resources()
    {
        return $this->hasMany(Resource::class, 'topic_id');
    }

    /**
     * @return string
     */
    public function statusText(): string
    {
        return $this->status ? 'Enable' : 'Disabled';
    }
}
