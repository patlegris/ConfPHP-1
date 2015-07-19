@extends('layouts.skeleton')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Conférence intéressante autour du PHP</h2>
                @include('post.partials.show')
                @include('comment.partials.create')
            </div>
            <div class="col-lg-3">
                @include('layouts.includes.sidebar')
            </div>
        </div>
    </div>
@endsection