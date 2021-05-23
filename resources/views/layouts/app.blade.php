<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="title" content="@yield('title'){{ config('app.name', 'Laravel') }}">
<meta name="description" content="Inspire international manpower supply is a newly established company with an experienced team working for 13 years in the gulf for supply and recruiting the perfect workers for your projects without any hassles.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title'){{ config('app.name', 'Laravel') }}">
<meta property="og:description" content="Inspire international manpower supply is a newly established company with an experienced team working for 13 years in the gulf for supply and recruiting the perfect workers for your projects without any hassles.">
<meta property="og:image" content="{{ asset('assets/ogimage.jpg') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="@yield('title'){{ config('app.name', 'Laravel') }}">
<meta property="twitter:description" content="Inspire international manpower supply is a newly established company with an experienced team working for 13 years in the gulf for supply and recruiting the perfect workers for your projects without any hassles.">
<meta property="twitter:image" content="{{ asset('assets/ogimage.jpg') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @livewireStyles()
</head>
<body class="w-full bg-gray-100">
    {{ $slot }}
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KFS7ZDW4NN"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KFS7ZDW4NN');
</script>
@livewireScripts()

</html>
