@extends('layouts.app')
@section('title', $domain->seo_title ?? "{$domain->domain} is on sale")

@section('content')
    <main class="min-h-screen flex flex-col text-white bg-gray-900">
        <header></header>
        <div class="text-4xl font-bold">{{ $domain->domain }}</div>
    </main>
@endsection
