<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="title" content="@yield('title') - {{ config('app.name', 'Laravel') }}">
<meta name="description" content="@yield('description')">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title') - {{ config('app.name', 'Laravel') }}">
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="{{ asset('assets/ogimage.jpg') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="@yield('title') - {{ config('app.name', 'Laravel') }}">
<meta property="twitter:description" content="@yield('description')">
<meta property="twitter:image" content="{{ asset('assets/ogimage.jpg') }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
@livewireStyles()
@if(Request()->route()->getPrefix() != '/panel')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@else
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
@endif
@stack('styles')
</head>

@if(Request()->route()->getPrefix() != '/panel')
<body class="w-full bg-gray-100">
    {{ $slot }}
</body>
@else
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @livewire('admin.components.navbar')
        @livewire('admin.components.sidebar')
        {{ $slot }}
        @livewire('admin.components.footer')
    </div>
</body>
@endif

<!-- Scripts -->

@livewireScripts()
@if(Request()->route()->getPrefix() != '/panel')
<script src="{{ asset('js/app.js') }}" defer></script>
@else
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
@endif
@stack('scripts')
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-KFS7ZDW4NN"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KFS7ZDW4NN');
</script> --}}

</html>
