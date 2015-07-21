<h3>
    {{ $post->title }}
</h3>

<p>
    {!! MyHtml::thumb(url('upload', $post->thumbnail_link), $post->slug) !!}
    {{ $post->content }}
</p>

<p class="url-site">
    {!! MyHtml::link('Lien vers le site de la conférence', $post->url_site) !!}
</p>

<p class="keyword">
    Mots clefs:
    @foreach($post->tags as $tag)
        @include('front.partials.tag.show')
    @endforeach
</p>

<p class="date">
    début:
    <time datetime="{{ $post->date_start }}">{{ $post->date_start }}</time>
    fin:
    <time datetime="{{ $post->date_end }}">{{ $post->date_end }}</time>
</p>