<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use App\Post;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function indexPost() {
        $posts = Post::all()
            ->sortByDesc('date_start');

        return view('dashboard.indexPost', compact('posts'));
    }

    public function getSortComment($status) {
        if ($status == 'all') {
            $comments = Comment::all()
                ->sortByDesc('created_at');
        }
        else {
            $comments = Comment::all()
                ->sortByDesc('created_at')
                ->where('status', $status);
        }

        return view('dashboard.partials.comment.index', compact('comments'));
    }
}
