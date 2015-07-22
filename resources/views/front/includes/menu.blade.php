<nav id="navbar-top" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Active::check('') }}">
                    <a href="{{ url('/') }}">
                        Accueil
                    </a>
                </li>
                <li class="{{ Active::check('about') }}">
                    <a href="{{ url('about') }}">
                        À propos
                    </a>
                </li>
                <li class="{{ Active::check('contact') }}">
                    <a href="{{ url('contact') }}">
                        Contact
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Active::check('login') }}">
                    <a href="{{ url('dashboard') }}">
                        <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                        Administration
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>