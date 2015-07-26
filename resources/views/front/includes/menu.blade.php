<nav id="navbar-top" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Active::check('') }}">
                    <a href="{{ url('/') }}">
                        Accueil
                    </a>
                </li>
                <li class="{{ Active::check('a-propos') }}">
                    <a href="{{ url('a-propos') }}">
                        À propos
                    </a>
                </li>
                <li class="{{ Active::check('contact') }}">
                    <a href="{{ url('contact') }}">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>