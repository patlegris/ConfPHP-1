<h3>
    {{ $post->title }}
</h3>

<p>
    {!! MyHtml::thumb($post->thumbnail_link, $post->slug) !!}
    {{ $post->content }}
</p>

@if($post->url_site)
    <p>
        {!! MyHtml::link('Lien vers le site de la conférence', $post->url_site) !!}
    </p>
@endif

@if(count($post->tags) > 0)
    <div>
        Mots clefs:
        @foreach($tags = $post->tags as $tag)
            @include('front.partials.tag.show')
        @endforeach
    </div>
@endif

<p class="date">
    début :
    <time datetime="{{ $post->date_start }}">{{ $post->date_start }}</time>
    -
    fin :
    <time datetime="{{ $post->date_end }}">{{ $post->date_end }}</time>
</p>