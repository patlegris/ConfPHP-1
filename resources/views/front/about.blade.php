@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>À propos de nous</h2>
            </div>
            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>
@endsection