<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Response;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showPosts() {
        $posts = Post::all();

        return view('front.index', compact('posts'));
    }
}
