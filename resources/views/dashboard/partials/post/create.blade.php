{!! Form::open(['url' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

<div class="form-group">
    {!! Form::label('title', 'Titre', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Ma conférence']) !!}
        @foreach($errors->get('title') as $message)
            <div class="text-danger text"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_start', 'Date de début', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
            <input readonly name="date_start" type="text" class="form-control" style="background: #fff;" placeholder="Cliquez pour saisir une date">
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('date_end', 'Date de fin', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
            <input readonly name="date_end" type="text" class="form-control" style="background: #fff;" placeholder="Cliquez pour saisir une date">
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('url_site', 'Site web', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('url_site', '', ['class' => 'form-control', 'placeholder' => 'http://www.my-conference.com']) !!}
        @foreach($errors->get('url_site') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'Résumé', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('excerpt', '', ['class' => 'form-control', 'maxlength' => '60', 'placeholder' => '60 caractères max']) !!}
        @foreach($errors->get('excerpt') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Description', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Description de la conférence']) !!}
        @foreach($errors->get('content') as $message)
            <div class="text-danger"><em>{{ $message }}</em></div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Tags', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        @foreach($tags as $tag)
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('tags[]', $tag->id) !!}
                    {{ $tag->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('thumbnail_link', 'Image', ['class' => 'col-lg-1 control-label']) !!}
    <div class="col-lg-5">
        <div class="input-group ">
            {!! Form::file('thumbnail_link') !!}
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-lg-offset-5 col-lg-1">
        {!! Form::submit('Créer', ['class' => 'form-control btn btn-success']) !!}
    </div>
</div>
{!! Form::close() !!}