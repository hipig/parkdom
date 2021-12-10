@extends('layouts.master')

@section('meta')
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
@endsection

@section('body')
    <div id="app" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100">
        <main class="flex flex-auto flex-col max-w-full">
            <div class="min-h-screen flex items-center justify-center relative overflow-hidden max-w-10xl mx-auto p-4 lg:p-8 w-full">
                @yield('content')
            </div>
        </main>
    </div>
@endsection
