@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')
    @include('front.partials.menu')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Conférences intéressantes autour du PHP</h2>
                @include('post.partials.indexPublish')
            </div>
            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>
@endsection