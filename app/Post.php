<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'content',
        'date_start',
        'date_end',
        'url_site'
    ];

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function setSlugAttribute($value) {
        $value = str_slug($value);
        $countSlug = count(Post::all()->where('slug', $value));

        $this->attributes['slug'] = $countSlug > 0 ? $value . '-' . ($countSlug + 1) : $value;
    }
}
