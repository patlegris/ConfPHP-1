<td class="{{ $post->status == 'publish' ? 'success' : 'warning' }}">
    {{ $post->status }}
</td>

<td>
    {!! MyHtml::link($post->title, 'conference/' . $post->id . '/edit') !!}
</td>

<td>
    @foreach($tags = $post->tags as $tag)
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
    {!! Form::open(['id' => $post->id, 'class' => 'status', 'url' => 'dashboard/conference/' . $post->id . '/status', 'method' => 'PUT']) !!}
    @if($post->status == 'publish')
        <button class="btn btn-default">
            Dé-publier
        </button>
    @else
        <button class="btn btn-success">
            Publier
        </button>
    @endif
    {!! Form::close() !!}
</td>

<td class="text-center">
    {!! Form::open(['class' => 'delete', 'url' => 'dashboard/conference/' . $post->id, 'method' => 'DELETE']) !!}
    <button data-toggle="modal"
            data-target="#modal-delete-post"
            class="btn btn-danger">
        Supprimer
    </button>
    {!! Form::close() !!}
</td>