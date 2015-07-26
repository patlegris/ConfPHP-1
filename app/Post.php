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

    public function scopeDateStart($query) {
        return Carbon::parse($query->getModel()->date_start)->formatLocalized('%e %b %Y, %Hh%M');
    }

    public function scopeDateEnd($query) {
        return Carbon::parse($query->getModel()->date_end)->formatLocalized('%e %b %Y, %Hh%M');
    }

    public function scopeUpdatedAt($query) {
        return Carbon::parse($query->getModel()->updated_at)->formatLocalized('%e %b %Y, %Hh%M');
    }

    public function scopePublishComments($query) {
        return $query
            ->getModel()
            ->comments
            ->sortByDesc('created_at')
            ->where('status', 'publish');
    }
}
