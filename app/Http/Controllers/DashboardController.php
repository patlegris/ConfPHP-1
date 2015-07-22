<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Tag;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function indexPost() {
        $posts = Post::all()
            ->sortByDesc('date_start');

        return view('dashboard.indexPost', compact('posts'));
    }
}
