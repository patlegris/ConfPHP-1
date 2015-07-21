<nav id="navbar-top" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Active::isActive('') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">accueil</a>
                </li>
                <li class="{{ Active::isActive('about') ? 'active' : '' }}">
                    <a href="{{ url('about') }}">à propos</a>
                </li>
                <li class="{{ Active::isActive('contact') ? 'active' : '' }}">
                    <a href="{{ url('contact') }}">contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('dashboard') }}">administration</a>
                </li>
            </ul>
        </div>
    </div>
</nav>