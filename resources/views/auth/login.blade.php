@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')
    <div class="row">
        <div class="container">
            <div class="col-lg-offset-3 col-lg-6 well">
                {!! Form::open(['url' => 'login', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend class="text-center">Identification</legend>

                    <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nom', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="text-danger col-lg-offset-3 col-lg-9">
                            {{ $errors->first('name') }}
                        </div>
                    </div>

                    <div class="form-group{{ ($errors->has('password')) ? ' has-error' : '' }}">
                        {!! Form::label('password', 'Mot de passe', ['class' => 'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="text-danger col-lg-offset-3 col-lg-9">
                            {{ $errors->first('password') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-3 checkbox col-lg-5">
                            <label>{!! Form::checkbox('remember', 'remember', false) !!}Se souvenir de moi</label>
                        </div>

                        <div class="col-lg-4">
                            {!! Form::submit('Connexion', ['class' => 'form-control btn btn-success']) !!}
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection