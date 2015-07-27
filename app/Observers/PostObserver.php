<?php

namespace App\Observers;

class PostObserver {

    /**
     * On post soft deleted, soft delete all comments associated
     *
     * @param $post
     * @return bool
     */
    public function deleted($post) {
        $post->comments()->delete();

        return true;
    }
}