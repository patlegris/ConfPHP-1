{!! Form::open(['url' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
<div class="form-group">
    {!! Form::label('title', 'Titre', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('title', '', ['class' => 'form-control']) !!}
        @foreach($errors->get('title') as $message)
            <div class="text-danger text"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'Résumé', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('excerpt', '', ['class' => 'form-control']) !!}
        @foreach($errors->get('excerpt') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Description', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::textarea('content', '', ['class' => 'form-control']) !!}
        @foreach($errors->get('content') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_start', 'Date de début', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        <input readonly name="date_start" type="text" class="form-control" placeholder="Cliquez pour saisir une date">
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_end', 'Date de fin', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        <input readonly name="date_end" type="text" class="form-control" placeholder="Cliquez pour saisir une date">
    </div>
</div>

{{--<div class="form-group">
    {!! Form::label('tags', 'Tags', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        @foreach($tags as $tag)
            <div>
                {!! Form::checkbox('tags[]', $tag->id) !!}    {{ $tag->name }}
            </div>
        @endforeach
    </div>
</div>--}}

<div class="form-group">
    {!! Form::label('link_thumbnail', 'Image', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        <div class="input-group ">
            {!! Form::file('link_thumbnail', ['id' => 'input-1']) !!}
        </div>

    </div>
</div>

<div class="form-group">
    {!! Form::label('url_site', 'Site web', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('url_site', '', ['class' => 'form-control']) !!}
        @foreach($errors->get('url_site') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-5 col-lg-1">
        {!! Form::submit('Créer', ['class' => 'form-control btn btn-success']) !!}
    </div>
</div>
{!! Form::close() !!}