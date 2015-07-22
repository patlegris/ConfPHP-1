<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Tag;
use Auth;
use Folklore\Image\Facades\Image;
use Illuminate\Http\Request;
use Response;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $tags = Tag::all();

        return view('dashboard.createPost', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        $params = array_merge(
            $request->all(),
            ['user_id' => Auth::user()->id]
        );

        $post = Post::create($params);
        $post->slug = $request->input('title');
        $post->tags()->attach($params['tags']);

        if ($request->hasFile('thumbnail_link')) {
            $file = $request->file('thumbnail_link');
            $ext = $file->getClientOriginalExtension();

            $rand_name = str_random(12) . '.' . $ext;

            Image::make($file->getRealPath(), [
                'width'  => 200,
                'height' => 200
            ])->save('upload/thumb-' . $rand_name);

            $post->thumbnail_link = 'thumb-' . $rand_name;
            $post->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     * @internal param null $slug
     * @internal param Request $request
     */
    public function show($id) {
        if (!$post = Post::all()->where('slug', $id)->first())
            $post = Post::find((int)$id);

        return view('front.showPost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    public function updateStatus(Request $request, $id) {
        $post = Post::find($id);

        if ($post->status == 'publish') $post->status = 'unpublish';
        else $post->status = 'publish';

        $post->save();

        return response()->json([
            'html'    => view('dashboard.partials.post.show', compact('post'))->render(),
            'message' => 'Statut de conférence modifié (' . $post->status . ')',
            'id'      => $post->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        Post::destroy($id);

        return 'Conférence supprimée';
    }
}
