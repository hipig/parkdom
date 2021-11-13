@extends('layouts.app')
@section('title', $domain->seo_title ?? "{$domain->domain} is on sale")

@section('content')
    <div class="text-4xl font-bold">{{ $domain->domain }}</div>
@endsection
