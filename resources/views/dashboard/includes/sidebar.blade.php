<aside class="fixed">
    <ul>
        <li>
            <a class="{{ Active::isActive('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">dashboard</a>
        </li>
        <li>
            <a class="{{ Active::isActive('post') ? 'active' : '' }}" href="{{ url('post/create') }}">ajouter une conférence</a>
        </li>
    </ul>
</aside>