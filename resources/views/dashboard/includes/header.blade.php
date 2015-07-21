<header>
    @if(Session::has('message'))
        <div class="bs-component navbar-fixed-top">
            <div class="alert alert-dismissible alert-success fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4 id="message">{{ Session::get('message') }}</h4>
            </div>
        </div>
    @endif

    @include('dashboard.includes.menu')
</header>