<td class="{{ $comment->status == 'publish' ? 'success' : ($comment->status == 'spam' ? 'danger' : 'warning') }}">
    {{ $comment->status }}
</td>

<td>
    {{ $comment->email }}
</td>

<td>
    {{ $comment->message }}
</td>

<td>
    {{ $comment->post->title }}
</td>

<td>
    <time datetime="{{ $comment->created_at }}">{{ $comment->created_at }}</time>
</td>

<td>
    <div class="row container-fluid">
        @if($comment->status == 'publish')
            <div class="col-lg-6">
                {!! Form::open(['id' => $comment->id, 'class' => 'status', 'url' => 'dashboard/comment/' . $comment->id .
                '/unpublish', 'method' => 'PUT']) !!}
                <button class="btn btn-default">
                    Dé-publier
                </button>
                {!! Form::close() !!}
            </div>

            <div class="col-lg-6">
                {!! Form::open(['id' => $comment->id, 'class' => 'status', 'url' => 'dashboard/comment/' . $comment->id . '/spam',
                'method' => 'PUT']) !!}
                <button class="btn btn-warning">
                    Spam
                </button>
                {!! Form::close() !!}
            </div>
        @else
            <div class="col-lg-12">
                {!! Form::open(['id' => $comment->id, 'class' => 'status', 'url' => 'dashboard/comment/' . $comment->id .
                '/publish', 'method' => 'PUT']) !!}
                <button class="btn btn-success">
                    Publier
                </button>
                {!! Form::close() !!}
            </div>
        @endif


    </div>
</td>

<td class="text-center">
    {!! Form::open(['class' => 'delete', 'url' => 'dashboard/comment/' . $comment->id, 'method' => 'DELETE']) !!}
    <div class="row container-fluid">
        <div class="col-lg-12">
            <button data-toggle="modal"
                    data-target="#modal-delete-comment"
                    class="btn btn-danger">
                Supprimer
            </button>
        </div>
    </div>
    {!! Form::close() !!}
</td>
