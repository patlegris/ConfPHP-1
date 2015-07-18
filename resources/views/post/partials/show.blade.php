<article>
    <h3>
        <a href="#">{{ $post->title }}</a>
    </h3>


    <table>
        <tr>
            <td>
                <img src="{{ url('upload', $post->thumbnail_link) }}" alt="test" class="img-thumbnail" />
            </td>
            <td class="excerpt">
                {{ $post->excerpt }}
                ... <a href="#">lire la suite</a>
            </td>
        </tr>
    </table>

    <p>
        Mots clefs: @foreach($post->tags as $tag)@include('tag.partials.show')@endforeach
    </p>

    <div class="date">
        début: <time datetime="{{ $post->date_start }}" pubdate>{{ $post->date_start }}</time>
        fin: <time datetime="{{ $post->date_end }}" pubdate>{{ $post->date_end }}</time>
    </div>
</article>