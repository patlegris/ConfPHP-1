<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Response;
use Illuminate\Http\Request;

class CommentController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['store', 'index']]);
    }
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

        return back()->with('message', 'Commentaire en attente de validation');
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

    public function putPublish($id) {
        return $this->changeStatus(Comment::find((int)$id), 'publish');
    }

    public function putSpam($id) {
        return $this->changeStatus(Comment::find((int)$id), 'spam');
    }

    public function putUnpublish($id) {
        return $this->changeStatus(Comment::find((int)$id), 'unpublish');
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
