<td>
    {{ $post->status }}
</td>

<td>
    {{ $post->title }}
</td>

<td>
    @foreach($post->tags as $tag)
        @include('front.partials.tag.show')
    @endforeach
</td>

<td>
    <time datetime="{{ $post->date_start }}">{{ $post->date_start }}</time>
</td>

<td>
    <time datetime="{{ $post->date_end }}">{{ $post->date_end }}</time>
</td>

<td>
    <time datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time>
</td>

<td>
    {!! Form::open(['id' => $post->id, 'class' => 'status', 'url' => 'post/' . $post->id . '/status', 'method' => 'PUT']) !!}
    <button data-toggle="modal"
            data-target="#modal-change-status-post"
            class="btn btn-warning">
        {{ $post->status == 'publish' ? 'Unpublish' : 'Publish' }}
    </button>
    {!! Form::close() !!}
</td>

<td class="text-center">
    {!! Form::open(['class' => 'delete', 'url' => 'post/' . $post->id, 'method' => 'DELETE']) !!}
    <button data-toggle="modal"
            data-target="#modal-delete-post"
            class="btn btn-danger">
        Supprimer
    </button>
    {!! Form::close() !!}
</td>