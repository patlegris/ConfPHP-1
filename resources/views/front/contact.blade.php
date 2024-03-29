@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Laissez-nous un message</h2>

                <article>
                    {!! Form::open(['url' => 'contact', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', '', ['class' => 'form-control']) !!}
                            @foreach($errors->get('email') as $message)
                                <div class="text-danger text"><em>{{ $message }}</em></div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('captcha', 'Calculer ' . Captcha::generate(), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-sm-10">
                            <input name="captcha" type="number" id="captcha" class="form-control">
                            @foreach($errors->get('captcha') as $message)
                                <div class="text-danger text"><em>{{ $message }}</em></div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('content', 'Message', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('content', '', ['class' => 'form-control']) !!}
                            @foreach($errors->get('content') as $message)
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
            </div>

            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>

    @include('front.includes.footer')
@endsection