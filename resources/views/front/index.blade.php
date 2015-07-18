@extends('layouts.partials.skeleton')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Conférences intéressantes autour du PHP</h2>
                @foreach($posts as $post)
                    @include('post.partials.show')
                @endforeach
            </div>
            <div class="col-lg-3">
                @include('layouts.includes.sidebar')
            </div>
        </div>
    </div>
@endsection