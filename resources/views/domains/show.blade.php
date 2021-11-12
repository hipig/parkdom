@extends('layouts.app')
@section('title', $domain->seo_title ?? "{$domain->name} is on sale")

@section('content')
    <div class="text-4xl font-bold">{{ $domain->name }}</div>
@endsection
