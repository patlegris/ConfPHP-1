{!! Form::open(['method' => 'PUT', 'url' => 'dashboard/conference/' . $post->id, 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-1">
        <label><em>Champ requis (*)</em></label>
    </div>
</div>

<div class="form-group">
    {!! Form::label('title', 'Titre (*)', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Titre de la conférence'])
        !!}
        @foreach($errors->get('title') as $message)
            <div class="text-danger text"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        {!! Form::text('slug', $post->slug, ['class' => 'form-control', 'placeholder' => 'Slug pour le référencement']) !!}
        @foreach($errors->get('slug') as $message)
            <div class="text-danger text"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_start', 'Date de début (*)', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
            <input readonly name="date_start" type="text" class="form-control" style="background: #fff;"
                   value="{{ old('date_start') ? old('date_start') : $post->date_start }}"
                   placeholder="Cliquez pour saisir une date">
        </div>
        @foreach($errors->get('date_start') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_end', 'Date de fin (*)', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
            <input readonly name="date_end" type="text" class="form-control" style="background: #fff;"
                   value="{{ old('date_end') ? old('date_end') : $post->date_end }}"
                   placeholder="Cliquez pour saisir une date">
        </div>
        @foreach($errors->get('date_end') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('url_site', 'Site web', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        {!! Form::text('url_site', $post->url_site, ['class' => 'form-control', 'placeholder' =>
        'http://www.my-conference.com']) !!}
        @foreach($errors->get('url_site') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'Résumé (*)', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        {!! Form::text('excerpt', $post->excerpt, ['class' => 'form-control', 'maxlength' => '60', 'placeholder' => 'Résumé de la conférence (60 caractères max)']) !!}
        @foreach($errors->get('excerpt') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Description (*)', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        {!! Form::textarea('content', $post->content, ['class' => 'form-control', 'placeholder' => 'Description de la
        conférence']) !!}
        @foreach($errors->get('content') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Tags', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        @foreach($tags as $tag)
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tags[]', $tag->id, $post->tags->where('id', $tag->id)->count() != 0) !!}
                    {{ $tag->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('thumbnail_link', 'Image', ['class' => 'col-lg-offset-2 col-lg-1 control-label']) !!}
    <div class="col-lg-7">
        <div class="input-group ">
            {!! Form::file('thumbnail_link') !!}
            @foreach($errors->get('thumbnail_link') as $message)
                <div class="text-danger"><em>{{ $message }}</em></div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-9 col-lg-1">
        {!! Form::submit('Modifier', ['class' => 'form-control btn btn-success']) !!}
    </div>
</div>
{!! Form::close() !!}