@extends('layouts.skeleton')

@section('body')
    @include('dashboard.includes.menu')
    @include('dashboard.includes.sidebar')

    <article class="dashboard">
        <h1>Gestion des commentaires</h1>

        <div class="row">
            <div class="col-lg-4">
                <div class="btn-group btn-group-justified">
                    <a href="#" class="btn btn-default" data-menu="all">Tous</a>
                    <a href="#" class="btn btn-default" data-menu="publish">Publiés</a>
                    <a href="#" class="btn btn-default" data-menu="unpublish">Dé-publiés</a>
                    <a href="#" class="btn btn-default" data-menu="spam">Spams</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <table class="table table-hover">
                @include('dashboard.partials.comment.index')
            </table>
        </div>
    </article>

@endsection