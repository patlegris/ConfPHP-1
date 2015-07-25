{!! Form::open(['url' => 'search', 'class' => 'inline-block']) !!}
{!! Form::hidden('tag_id', $tag->id) !!}
{!! Form::submit($tag->name, ['class' => 'btn btn-link']) !!}@if($tags[count($tags) - 1] != $tag), @endif
{!! Form::close() !!}
