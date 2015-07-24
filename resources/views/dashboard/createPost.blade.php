@extends('layouts.skeleton')

@section('body')
    @include('dashboard.includes.menu')
    @include('dashboard.includes.sidebar')

    <article class="dashboard">
        <div class="text-center container-fluid">
            <h1>Ajouter une conférence</h1>
        </div>

        <div class="container-fluid">
            @include('dashboard.partials.post.create')
        </div>
    </article>

@endsection