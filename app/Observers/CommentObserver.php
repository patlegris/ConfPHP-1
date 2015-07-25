<?php

namespace App\Observers;

class CommentObserver {

    public function saved($comment) {
        if ($comment->status == 'publish')
            $comment->post->count_comments++;
        else
            $comment->post->count_comments--;

        $comment->post->save();
        return true;
    }

    public function deleted($comment) {
        if ($comment->status == 'publish') {
            $comment->post->count_comments--;
            $comment->post->save();
        }

        return true;
    }
}