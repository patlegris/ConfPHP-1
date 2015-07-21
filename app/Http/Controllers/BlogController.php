<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Response;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexPublishPosts() {
        $posts = Post::all()
            ->sortByDesc('date_start')
            ->where('status', 'publish');

        return view('front.index', compact('posts'));
    }

    public function indexAllPosts() {
        $posts = Post::all();

        return view('dashboard.index', compact('posts'));
    }

    public function about() {
        return view('front.about');
    }

    public function contact() {
        return view('front.contact');
    }
}
