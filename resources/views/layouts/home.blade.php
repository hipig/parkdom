@extends('layouts.master')

@section('meta')
    @hasSection('title')
        <title>@yield('title') - {{ $generalSetting->site_name }}</title>
    @else
        <title>{{ $generalSetting->site_name }}</title>
    @endif

    <meta name="keywords" content="@yield('keywords', $generalSetting->site_keywords ?? '')">
    <meta name="description" content="@yield('description', $generalSetting->site_description ?? '')">
@endsection

@section('body')
    <div id="app" class="flex flex-col mx-auto w-full min-h-screen bg-gray-50">
        @hasSection('header')
            @yield('header')
        @else
            @include('partials.home.header')
        @endif

        @yield('content')

        @hasSection('footer')
            @yield('footer')
        @else
            @include('partials.home.footer')
        @endif
    </div>
@endsection
