<?php

namespace App\Observers;

class PostObserver {

    public function deleted($post) {
        $post->comments()->delete();

        return true;
    }
}