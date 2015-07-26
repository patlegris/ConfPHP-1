<h3>
    {!! MyHtml::link($post->title, url('conference', ($post->slug ? $post->slug : $post->id))) !!}
</h3>

<p>
    {!! MyHtml::thumb($post->thumbnail_link, $post->slug) !!}
    <span class="txt-thumbnail">
        {{ $post->excerpt }}
        ... {!! MyHtml::link('lire la suite', url('conference', ($post->slug ? $post->slug : $post->id))) !!}
    </span>
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

<p>
    @if($post->publishComments()->count() > 0)
        Nombre de commentaires : {{ $post->publishComments()->count() }}
    @else
        Soyez le premier à laisser un commentaire !
    @endif
</p>

<p class="date">
    début :
    <time datetime="{{ $post->date_start }}">{{ $post->dateStart() }}</time>
    -
    fin :
    <time datetime="{{ $post->date_end }}">{{ $post->dateEnd() }}</time>
</p>