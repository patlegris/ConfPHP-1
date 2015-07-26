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
        $posts = Post::all()
            ->sortByDesc('date_start');

        return view('dashboard.indexPost', compact('posts'));
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
     * @param Requests\StorePostFormRequest|Request $request
     * @return Response
     */
    public function store(Requests\StorePostFormRequest $request) {
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;

        $post = Post::create($params);
        $post->tags()->attach($params['tags']);

        if ($request->hasFile('thumbnail_link')) {
            $file = $request->file('thumbnail_link');
            $ext = $file->getClientOriginalExtension();

            $rand_name = $params['user_id'] . '.' . $ext;

            Image::make($file->getRealPath(), [
                'width'  => 200,
                'height' => 200
            ])->save('assets/upload/thumb-' . $rand_name);

            $post->thumbnail_link = 'thumb-' . $rand_name;
        }

        $post->save();

        return redirect('dashboard/conference')->with('message', 'Conférence créée');
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
        /*if (!$post = Post::where('slug', $id)->first())
            $post = Post::find((int)$id);

        return view('front.showPost', compact('post'));

        $post = Post::find($id);

        if ($post->status == 'publish') $post->status = 'unpublish';
        else $post->status = 'publish';

        $post->save();

        return response()->json([
            'html'    => view('dashboard.partials.post.show', compact('post'))->render(),
            'message' => 'Statut de conférence modifié (' . $post->status . ')',
            'id'      => $post->id
        ]);*/

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $post = Post::find((int)$id);
        $tags = Tag::all();

        return view('dashboard.editPost', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Requests\UpdatePostFormRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(Requests\UpdatePostFormRequest $request, $id) {
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;

        $post = Post::find($id);
        $post->tags()->detach();
        $post->update($params);
        $post->tags()->attach($request->input('tags'));

        if ($request->hasFile('thumbnail_link')) {
            $file = $request->file('thumbnail_link');
            $ext = $file->getClientOriginalExtension();

            $rand_name = $params['user_id'] . '.' . $ext;

            Image::make($file->getRealPath(), [
                'width'  => 200,
                'height' => 200
            ])->save('assets/upload/thumb-' . $rand_name);

            $post->thumbnail_link = 'thumb-' . $rand_name;
        }

        $post->save();

        return redirect('dashboard')->with('message', 'Conférence modifiée');
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

    public function putStatus($id) {
        $post = Post::find($id);

        if ($post->status == 'publish') $post->status = 'unpublish';
        else $post->status = 'publish';

        $post->save();

        return response()->json([
            'html'    => view('dashboard.partials.post.show', compact('post'))->render(),
            'message' => 'Statut de conférence modifié',
            'id'      => $post->id
        ]);
    }
}
