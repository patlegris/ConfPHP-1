<article>
    <h3>
        Laisser un commentaire
    </h3>

    {!! Form::open(['url' => 'comment/store', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::email('email', '', ['class' => 'form-control']) !!}
            @foreach($errors->get('email') as $message)
                <div class="text-danger text"><em>{{ $message }}</em></div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('message', 'Message', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('message', '', ['class' => 'form-control']) !!}
            @foreach($errors->get('message') as $message)
                <div class="text-danger text"><em>{{ $message }}</em></div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2">
            {!! Form::submit('Envoyer', ['class' => 'form-control btn btn-success']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</article>