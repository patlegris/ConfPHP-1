@extends('layouts.skeleton')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Conférence intéressante autour du PHP</h2>
                @include('front.partials.showBlog')

                @include('front.partials.comment.create')

                <article>
                    @foreach($post->comments->sortByDesc('created_at') as $comment)
                        @include('front.partials.comment.show')
                    @endforeach
                </article>
            </div>
            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>
@endsection