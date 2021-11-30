<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @hasSection('title')
        <title>@yield('title') - {{ $generalSetting->site_name }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <meta name="keywords" content="@yield('keywords', $generalSetting->site_keywords ?? '')">
    <meta name="description" content="@yield('description', $generalSetting->site_description ?? '')">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stack('styles')

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
@stack('beforeScripts')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="font-sans leading-normal antialiased">

@include('partials.header')

@yield('content')

@include('partials.footer')

@stack('scripts')

</body>
</html>
