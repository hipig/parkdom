@extends('layouts.admin')
@section('title', joinTitle([__('Edit'), __('Languages')]))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.languages.index') }}">{{ __('Languages') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Edit') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>{{ __('Edit') }}</h3>
        </div>
        <form action="{{ route('admin.languages.update', $language) }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                @method('put')
                <div class="space-y-6 md:w-2/3">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="space-y-1">
                            <label for="language" class="text-gray-900 font-semibold">{{ __('Name') }}</label>
                            <div class="py-2 text-gray-700">{{ $language->name }}</div>
                        </div>
                        <div class="space-y-1">
                            <label for="language" class="text-gray-900 font-semibold">{{ __('Code') }}</label>
                            <div class="py-2 text-gray-700">{{ $language->code }}</div>
                        </div>
                    </div>
                    @if(!$language->default)
                        <div class="space-y-1">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" id="default" name="default" class="form-switch transition-all duration-150 ease-out rounded-full h-7 w-12 text-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" {{ old('default', $language->default) ? 'checked' : '' }}>
                                <label for="default" class="font-medium">
                                    {{ __('Default') }}
                                </label>
                            </div>
                        </div>
                    @endif
                    <div class="space-y-1">
                        <label for="cover" class="text-gray-900 font-semibold">{{ __('Status') }}</label>
                        <div class="w-full md:w-3/5 space-x-6">
                            @foreach(\App\Models\Language::$statusMap as $key => $value)
                                <label class="inline-flex items-center space-x-2">
                                    <input id="status" type="radio" name="status" value="{{ $key }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('status', \App\Models\DomainCategory::STATUS_ENABLE) == $key ? 'checked' : '' }}>
                                    <span>{{ $value }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50 space-x-2">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    {{ __('Save') }}
                </button>
                <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    {{ __('Back') }}
                </button>
            </div>
        </form>
    </div>
@endsection
