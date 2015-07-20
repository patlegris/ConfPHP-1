@foreach($posts as $post)
    <tr class="{{ $post->status == 'publish' ? 'success' : 'danger' }}">
        <td>
            {{ $post->status }}
        </td>

        <td>
            {{ $post->title }}
        </td>

        <td>
            @include('tag.partials.index')
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
            @if($post->status == 'publish')
                <button class="btn btn-warning">Unpublish</button>
            @else
                <button class="btn btn-warning">Publish</button>
            @endif
        </td>

        <td class="text-center">
            <button class="btn btn-danger">Supprimer</button>
        </td>
    </tr>
@endforeach