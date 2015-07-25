<aside class="fixed">
    <ul>
        <li>
            <a class="{{ Active::check('dashboard') }}"
               href="{{ url('dashboard') }}">
                <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                Dashboard
            </a>
        </li>
        <li>
            <a class="{{ Active::check('conference', 'create') }}"
               href="{{ url('conference/create') }}">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                Ajouter une conférence
            </a>
        </li>
        <li>
            <a class="{{ Active::check('comment') }}"
               href="{{ url('comment') }}">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                Gestion des commentaires
            </a>
        </li>
    </ul>
</aside>