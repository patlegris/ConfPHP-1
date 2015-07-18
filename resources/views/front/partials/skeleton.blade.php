<!doctype html><!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]--><!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]--><!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]--><!--[if gt IE 8]><!--><html class="no-js" lang=""><!--<![endif]-->
<head>
    @include('front.includes.head')
</head>

<body>
    @include('front.includes.header')
    @yield('body')
    @include('front.includes.footer')

    @include('front.includes.scripts')
</body>
</html>