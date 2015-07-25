<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Response;
use Illuminate\Http\Request;

class CommentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $comments = Comment::all()
            ->sortByDesc('created_at');

        return view('dashboard.indexComment', compact('comments'));
    }

    public function validateComment() {
        $comments = Comment::all()
            ->sortByDesc('created_at')
            ->where('status', 'unpublish');

        return view('dashboard.validateComment', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\StoreCommentFormRequest|Request $request
     * @return Response
     */
    public function store(Requests\StoreCommentFormRequest $request) {
        Comment::create($request->all());

        return back()->with('message', 'Commentaire ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        //
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

    public function putPublish($id) {
        $comment = Comment::find($id);

        $comment->status = 'publish';
        $comment->save();

        return response()->json([
            'html'    => view('dashboard.partials.comment.show', compact('comment'))->render(),
            'message' => 'Statut du commentaire modifié (publish)',
            'id'      => $comment->id
        ]);
    }

    public function putSpam($id) {
        $comment = Comment::find($id);

        $comment->status = 'spam';
        $comment->save();

        return response()->json([
            'html'    => view('dashboard.partials.comment.show', compact('comment'))->render(),
            'message' => 'Statut du commentaire modifié (publish)',
            'id'      => $comment->id
        ]);
    }

    public function putUnpublish($id) {
        $comment = Comment::find($id);

        $comment->status = 'unpublish';
        $comment->save();

        return response()->json([
            'html'    => view('dashboard.partials.comment.show', compact('comment'))->render(),
            'message' => 'Statut du commentaire modifié (unpublish)',
            'id'      => $comment->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        Comment::destroy($id);

        return 'Commentaire supprimé';
    }
}
