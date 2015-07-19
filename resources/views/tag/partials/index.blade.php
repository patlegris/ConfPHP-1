@foreach($post->tags as $tag)
    <a href="#">{{ $tag->name }}</a>
@endforeach
