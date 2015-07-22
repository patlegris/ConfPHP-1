@extends('layouts.skeleton')

@section('body')
    @include('dashboard.includes.menu')
    @include('dashboard.includes.sidebar')

    <section>
        <h1>Dashboard</h1>
        <div class="container-fluid">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Statut</th>
                    <th>Titre</th>
                    <th>Mots clefs</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Dernière mise à jour</th>
                    <th>Changer le statut</th>
                    <th>Supprimer</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr id="{{ $post->id }}" class="{{ $post->status == 'publish' ? 'info' : 'success' }}">
                        @include('dashboard.partials.post.show')
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection