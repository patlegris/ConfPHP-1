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
        abort(404);
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        abort(404);
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

    public function putPublish($id) {
        return $this->changeStatus(Comment::find($id), 'publish');
    }

    public function putSpam($id) {
        return $this->changeStatus(Comment::find($id), 'spam');
    }

    public function putUnpublish($id) {
        return $this->changeStatus(Comment::find($id), 'unpublish');
    }

    public function getAll() {
        return $this->changeFilter('all');
    }

    public function getPublish() {
        return $this->changeFilter('publish');
    }

    public function getUnpublish() {
        return $this->changeFilter('unpublish');
    }

    public function getSpam() {
        return $this->changeFilter('spam');
    }




    private function changeFilter($filter) {
        if ($filter == 'all') {
            $comments = Comment::all()
                ->sortByDesc('created_at');
        }
        else {
            $comments = Comment::all()
                ->sortByDesc('created_at')
                ->where('status', $filter);
        }

        return view('dashboard.partials.comment.index', compact('comments'));
    }

    private function changeStatus($comment, $status) {
        $comment->status = $status;
        $comment->save();

        return response()->json([
            'html'    => view('dashboard.partials.comment.show', compact('comment'))->render(),
            'message' => 'Statut du commentaire modifié',
            'id'      => $comment->id
        ]);
    }
}
