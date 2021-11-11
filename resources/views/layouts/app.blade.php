@extends('layouts.master')

@section('body')
    @include('partials.header')

    <main>

        @yield('content')

    </main>

    @include('partials.footer')
@endsection
