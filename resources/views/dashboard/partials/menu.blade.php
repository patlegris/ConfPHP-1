<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Conférences PHP</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">retour au site</a></li>
                <li><a href="{{ url('auth/logout') }}">se déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>