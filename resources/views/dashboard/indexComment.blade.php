@extends('layouts.skeleton')

@section('body')
    @include('dashboard.includes.menu')
    @include('dashboard.includes.sidebar')

    <article class="dashboard">
        <h1>Gestion des commentaires</h1>

        <p>
            <button class="btn btn-info ajax"
                    data-url="all-comment">
                Tous
            </button>
            <button class="btn btn-default ajax"
                    data-url="unpublish-comment">
                Non-publiés
            </button>
            <button class="btn btn-success ajax"
                    data-url="publish-comment">
                Publiés
            </button>
            <button class="btn btn-warning ajax"
                    data-url="spam-comment">
                Spams
            </button>
        </p>

        <div class="container-fluid">
            <table class="table table-hover">
                @include('dashboard.partials.comment.index')
            </table>
        </div>
    </article>

@endsection