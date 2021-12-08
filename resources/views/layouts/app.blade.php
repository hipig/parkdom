@extends('layouts.master')

@section('meta')
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
@endsection

@section('body')
    <div id="app" x-data="pageContainer" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100" :class="{'lg:pl-64': desktopSidebarOpen}">
        @include('partials.sidebar')
        @include('partials.header')
        <main id="page-content" class="flex flex-auto flex-col max-w-full pt-16">
            <div class="max-w-8xl mx-auto p-4 lg:p-8 w-full space-y-6">

                @yield('breadcrumb')

                @include('partials.message')

                @yield('content')

            </div>
        </main>
        @include('partials.footer')
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pageContainer', () => ({
                desktopSidebarOpen: true,
                mobileSidebarOpen: false
            }))
        })
    </script>
@endpush
