<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;

class FrontController extends Controller {

    public function index() {
        $posts = Post::all()
            ->sortByDesc('date_start')
            ->where('status', 'publish');

        return view('front.index', compact('posts'));
    }

    public function about() {
        return view('front.about');
    }

    public function contact() {
        return view('front.contact');
    }
}
