@extends('layouts.master')

@section('body')
    <div id="app" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100">
        <main class="flex flex-auto flex-col max-w-full">
            <div class="min-h-screen flex items-center justify-center relative overflow-hidden max-w-7xl mx-auto p-4 lg:p-8 w-full">
                @yield('content')
            </div>
        </main>
    </div>
@endsection
