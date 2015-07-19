<header>
    @if(Session::has('message'))
        <div class="bs-component navbar-fixed-top">
            <div class="alert alert-dismissible alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>{{ Session::get('message') }}</h4>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row title">
            <h1><a href="{{ url('/') }}">ConfPHP</a></h1>
            <h4>Prochaines conférences 2015</h4>
        </div>
    </div>
</header>