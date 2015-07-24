<footer>
    <nav id="navbar-bottom" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}">
                            Accueil
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('mentions') }}">
                            Mentions légales
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('dashboard') }}">
                            Administration
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</footer>