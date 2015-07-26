<footer>
    <nav id="navbar-bottom" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Active::check('') }}">
                        <a href="{{ url('/') }}">
                            Accueil
                        </a>
                    </li>

                    <li class="{{ Active::check('legal-notice') }}">
                        <a href="{{ url('legal-notice') }}">
                            Mentions légales
                        </a>
                    </li>

                    <li class="{{ Active::check('contact') }}">
                        <a href="{{ url('contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('dashboard/conference') }}">
                            Administration
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</footer>