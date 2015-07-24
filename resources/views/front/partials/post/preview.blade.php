<h3>
    {!! MyHtml::link($post->title, url('conference', $post->slug)) !!}
</h3>

<p>
    {!! MyHtml::thumb($post->thumbnail_link, $post->slug) !!}
    <span class="txt-thumbnail">
        {{ $post->excerpt }}
        ... {!! MyHtml::link('lire la suite', url('conference', $post->slug)) !!}
    </span>
</p>

<p class="url-site">
    {!! MyHtml::link('Lien vers le site de la conférence', $post->url_site) !!}
</p>

<p class="keyword">
    Mots clefs:
    @foreach($tags = $post->tags as $tag)
        @include('front.partials.tag.show')
    @endforeach
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