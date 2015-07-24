<?php

namespace App\Observers;

class CommentObserver {

    public function created($comment) {
        $comment->post->count_comments++;
        $comment->post->save();

        return true;
    }

    public function deleted($comment) {
        $comment->post->count_comments--;
        $comment->post->save();

        return true;
    }
}