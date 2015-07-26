<?php

namespace App;

use App\Observers\CommentObserver;
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

    public static function boot() {
        parent::boot();
        parent::observe(new CommentObserver);
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->formatLocalized('%a %e %b %Y, %H:%M');
    }

    public function scopePublish($query) {
        dd($query);
        $query
            ->sortByDesc('created_at')
            ->where('status', 'publish');
    }
}
