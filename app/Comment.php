<?php

namespace App;

use App\Observers\CommentObserver;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'email',
        'message',
        'post_id'
    ];

    public static function boot() {
        parent::boot();
        parent::observe(new CommentObserver);
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
