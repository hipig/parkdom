@extends('layouts.master')

@section('meta')
    @hasSection('title')
        <title>@yield('title') - {{ $generalSetting->getTranslation('site_name') }}</title>
    @else
        <title>{{ $generalSetting->getTranslation('site_name') }}</title>
    @endif

    <meta name="keywords" content="@yield('keywords', $generalSetting->getTranslation('site_keywords'))">
    <meta name="description" content="@yield('description', $generalSetting->getTranslation('site_description'))">
@endsection

@section('body')
    <div id="app" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100">
        @hasSection('header')
            @yield('header')
        @else
            @include('partials.home.header')
        @endif

        <div class="flex flex-col flex-1">

            @yield('content')

        </div>

        @hasSection('footer')
            @yield('footer')
        @else
            @include('partials.home.footer')
        @endif
    </div>
@endsection
