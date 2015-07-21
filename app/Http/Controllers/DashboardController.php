<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;

class DashboardController extends Controller {

    public function index() {
        $posts = Post::all()
            ->sortByDesc('date_start');

        return view('dashboard.index', compact('posts'));
    }
}
