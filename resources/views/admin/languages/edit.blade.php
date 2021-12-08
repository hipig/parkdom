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
        <form action="{{ route('admin.languages.store') }}" method="post" enctype="multipart/form-data">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1" x-data="filepondContainer">
                        <label for="language" class="text-gray-900 font-semibold">{{ __('Name') }}</label>
                        <div class="py-2 text-gray-700">{{ $language->name }}</div>
                    </div>
                    <div class="space-y-1" x-data="filepondContainer">
                        <label for="language" class="text-gray-900 font-semibold">{{ __('Code') }}</label>
                        <div class="py-2 text-gray-700">{{ $language->code }}</div>
                    </div>
                    <div class="space-y-1">
                        <label for="default" class="text-gray-900 font-semibold">{{ __('Default') }}</label>
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="default" name="default" class="form-switch transition-all duration-150 ease-out rounded-full h-7 w-12 text-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" {{ $language->default ? 'checked' : '' }}>
                        </div>
                    </div>

                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50 space-x-2">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    {{ __('Save') }}
                </button>
                <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    {{ __('Back') }}
                </button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ mix('vendor/filepond/filepond.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('vendor/filepond/filepond.js') }}"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('filepondContainer', () => ({
                path: '',
                filepond: null,

                init() {
                    this.filepond = FilePond.create(document.getElementById('language'), {
                        storeAsFile: true,
                        allowMultiple: false,
                        maxFiles: 1,
                    })
                }
            }))
        })
    </script>
@endpush
