<?php

namespace App\Http\Controllers;

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

    public function createPost() {
        return view('dashboard.createPost');
    }
}
