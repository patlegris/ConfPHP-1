<header>
    <div class="container">
        <div class="row title">
            <h1><a href="#">ConfPHP</a></h1>
            <h4>Prochaines conférences 2015</h4>
        </div>
    </div>

    <nav id="navbar-top" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/') }}">accueil</a></li>
                    <li><a href="{{ url('about') }}">à propos</a></li>
                    <li><a href="{{ url('contact') }}">contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('auth/login') }}">administration</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @if(Session::has('message'))
        <div class="bs-component navbar-fixed-top">
            <div class="alert alert-dismissible alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>{{ Session::get('message') }}</h4>
            </div>
        </div>
    @endif
</header>