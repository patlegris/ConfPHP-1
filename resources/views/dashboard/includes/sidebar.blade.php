<aside class="fixed">
    <ul>
        <li>
            <a class="{{ Active::check('dashboard', 'conference') }}"
               href="{{ url('dashboard/conference') }}">
                <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                Dashboard
            </a>
        </li>
        <li>
            <a class="{{ Active::check('dashboard', 'create') }}"
               href="{{ url('dashboard/conference/create') }}">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                Ajouter une conférence
            </a>
        </li>
        <li>
            <a class="{{ Active::check('dashboard', 'comment') }}"
               href="{{ url('dashboard/comment') }}">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                Gestion des commentaires
            </a>
        </li>
    </ul>
</aside>