@extends('layouts.skeleton')

@section('body')
    @include('dashboard.includes.menu')
    @include('dashboard.includes.sidebar')

    <section>
        <h1>Ajouter une conférence</h1>

        <div class="container-fluid">
            @include('dashboard.partials.post.create')
        </div>
    </section>

@endsection