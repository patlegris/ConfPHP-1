<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

    use SoftDeletes;

    protected $fillable = [
        'email',
        'message',
        'post_id'
    ];

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->formatLocalized('%a %e %b %Y, %H:%M');
    }
}
