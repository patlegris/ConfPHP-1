@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Conférence intéressante autour du PHP</h2>

                <article>
                    @include('front.partials.post.show')
                </article>

                <article>
                    @include('front.partials.comment.create')
                </article>

                <article>
                    @foreach($post->comments->sortByDesc('created_at') as $comment)
                        <div class="comment well">
                            @include('front.partials.comment.show')
                        </div>
                    @endforeach
                </article>
            </div>
            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>
@endsection