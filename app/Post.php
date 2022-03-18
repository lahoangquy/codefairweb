<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public const postType = [
        'event' => 'Event',
        'challenge' => 'Challenge',
        'competition' => 'Competition',
        'industry' => 'Industry',
        'for-school' => 'Secondary School',
    ];

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = self::createSlug($post->title);
            return true;
        });
    }

    private static function createSlug($name)
    {
        $slug = \Str::slug($name);

        if (static::whereSlug($slug)->exists()) {
            $max = static::whereTitle($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($matches) {
                    return $matches[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }

        return $slug;
    }

    /**
     * Undocumented function
     *
     * @param Builder $query
     * @param array $type
     * @return void
     */
    public function scopeType(Builder $query, array $type)
    {
        return $query->whereIn('post_type', $type);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * filter all posts marked as a highlight
     *
     * @param Builder $query
     * @param  boolean $marked
     * @return Builder
     */
    public function scopeHighlight(Builder $query, $marked = true): Builder
    {
        return $query->where('highlight', $marked);
    }

    /**
     * @return string
     */
    public function statusText(): string
    {
        return $this->status ? 'Show' : 'Hidden';
    }

    public function scopeBuildRoute()
    {
        if ($this->post_type === 'event') {
            return route('event.detail', $this->slug);
        }

        if ($this->apply_to_object == 2) {
            return route('higher-education.detail', $this->slug);
        }

        if ($this->post_type === 'for-school') {
            return route('secondary-school.detail', $this->slug);
        }

        if ($this->post_type === 'industry') {
            return route('industry.detail', $this->slug);
        }

        return route('cdu.student.detail', $this->slug);
    }
}
