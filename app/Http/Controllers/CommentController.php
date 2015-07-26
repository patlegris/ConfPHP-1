<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Response;

class CommentController extends Controller {

    /**
     * Set middleware 'auth' for this controller,
     * except for store and index actions
     */
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

    /**
     * Return all comments
     *
     * @return \Illuminate\View\View
     */
    public function getAll() {
        return $this->changeFilter('all');
    }

    /**
     * Return all published comments
     *
     * @return \Illuminate\View\View
     */
    public function getPublish() {
        return $this->changeFilter('publish');
    }

    /**
     * Return all unpublished comments
     *
     * @return \Illuminate\View\View
     */
    public function getUnpublish() {
        return $this->changeFilter('unpublish');
    }

    /**
     * Return all spam comments
     *
     * @return \Illuminate\View\View
     */
    public function getSpam() {
        return $this->changeFilter('spam');
    }

    /**
     * Set the status to publish
     *
     * @return \Illuminate\View\View
     */
    public function putPublish($id) {
        return $this->changeStatus(Comment::find((int)$id), 'publish');
    }

    /**
     * Set the status to unpublish
     *
     * @return \Illuminate\View\View
     */
    public function putUnpublish($id) {
        return $this->changeStatus(Comment::find((int)$id), 'unpublish');
    }

    /**
     * Set the status to spam
     *
     * @return \Illuminate\View\View
     */
    public function putSpam($id) {
        return $this->changeStatus(Comment::find((int)$id), 'spam');
    }

    /**
     * Return all comments sort by $filter
     *
     * @param $filter
     * @return \Illuminate\View\View
     */
    private function changeFilter($filter) {
        if ($filter == 'all') {
            $comments = Comment::all()
                ->sortByDesc('created_at');
        } else {
            $comments = Comment::all()
                ->sortByDesc('created_at')
                ->where('status', $filter);
        }

        return view('dashboard.partials.comment.index', compact('comments'));
    }

    /**
     * Change the $comment status to $status
     *
     * @param $comment
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
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
