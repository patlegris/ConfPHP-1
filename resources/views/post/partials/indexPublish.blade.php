@foreach($posts as $post)
    <article>
        <h3>
            <a href="{{ url('post', $post->id) }}">{{ $post->title }}</a>
        </h3>

        <p>
            {!! MyHtml::thumb(url('upload', $post->thumbnail_link), $post->slug) !!}
            <span class="txt-thumbnail">
                {{ $post->excerpt }}
                ... <a href="{{ url('post', $post->id) }}">lire la suite</a>
            </span>
        </p>

        <p class="url-site">
            {!! MyHtml::link('Lien vers le site de la conférence', $post->url_site) !!}
        </p>

        <p class="keyword">
            Mots clefs: @include('tag.partials.index')
        </p>

        <p class="count-comment">
            Nombre de commentaires :
        </p>

        <p class="date">
            début:
            <time datetime="{{ $post->date_start }}">{{ $post->date_start }}</time>
            fin:
            <time datetime="{{ $post->date_end }}">{{ $post->date_end }}</time>
        </p>
    </article>
@endforeach