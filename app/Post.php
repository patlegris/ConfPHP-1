<?php

namespace App;

use App\Observers\PostObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'date_start',
        'date_end',
        'url_site'
    ];

    public static function boot() {
        parent::boot();
        parent::observe(new PostObserver);
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function setSlugAttribute($value) {
        $value = str_slug($value);
        $countSlug = Post::isSlugUnique($value);

        $this->attributes['slug'] = is_int($countSlug) ? $value . '-' . ($countSlug + 1) : $value;
    }

    public function scopeIsSlugUnique($query, $val) {
        return count($query->where('slug', 'LIKE', "$val%")->get());
    }

    public function getDateStartAttribute($date) {
        return Carbon::parse($date)->formatLocalized('%e %B %Y, %H:%M');
    }

    public function getDateEndAttribute($date) {
        return Carbon::parse($date)->formatLocalized('%e %B %Y, %H:%M');
    }

    public function scopePublishComments($query) {
        return $query
            ->getModel()
            ->comments
            ->sortByDesc('created_at')
            ->where('status', 'publish');
    }
}
