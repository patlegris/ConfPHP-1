<?php

namespace App\Observers;

class CommentObserver {

    public function updated($comment) {
        if ($comment->status == 'publish') {
            $comment->post->count_comments++;
            $comment->post->save();
        }

        return true;
    }

    public function deleted($comment) {
        $comment->post->count_comments--;
        $comment->post->save();

        return true;
    }
}