@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Conférences intéressantes autour du PHP</h2>

                @foreach($posts as $post)
                    <article>
                        @include('front.partials.post.preview')
                    </article>
                @endforeach
            </div>

            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>

    @include('front.includes.footer')
@endsection