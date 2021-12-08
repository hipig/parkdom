@extends('layouts.admin')
@section('title', __('Languages'))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Languages') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
            <form action="{{ route('admin.languages.index') }}" method="get" class="space-y-3 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                <div class="flex items-center space-x-2">
                    <label for="keyword" class="flex-shrink-0 text-sm font-semibold">{{ __('Keyword') }}</label>
                    <input type="text" id="keyword" name="keyword" value="{{ old('keyword', request()->keyword) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Name / Code') }}">
                </div>
                <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Search') }}</span>
                </button>
                <a href="{{ route('admin.languages.index') }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ __('Clear') }}</span>
                </a>
            </form>
        </div>
    </div>
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900">{{ __('Languages') }}</span>
                <div class="space-x-2">
                    <a href="{{ route('admin.languages.create') }}" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                        {{ __('New') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="flex-grow w-full">
            <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                <table class="min-w-full text-sm align-middle whitespace-nowrap">
                    <thead>
                    <tr class="text-gray-700 text-left bg-gray-50 font-semibold">
                        <th class="py-2 px-6">{{ __('Language Name') }}</th>
                        <th class="py-2 px-6">{{ __('Language Code') }}</th>
                        <th class="py-2 px-6 text-center">{{ __('Status') }}</th>
                        <th class="py-2 px-6">{{ __('Created at') }}</th>
                        <th class="py-2 px-6">{{ __('Action') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($languages as $language)
                        <tr class="border-t border-gray-100">
                            <td class="py-3 px-6">
                                <span class="text-gray-700 font-semibold">{{ $language->name }}</span>
                                @if($language->default)
                                    <span class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded-full text-indigo-700 bg-indigo-200">{{ __('Default') }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">
                                <div class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded text-gray-600 bg-gray-100">{{ $language->code }}</div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                @if($language->status)
                                    <span class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded-full text-green-700 bg-green-200">{{ __('Enable') }}</span>
                                @else
                                    <span class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded-full text-red-700 bg-red-200">{{ __('Disable') }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $language->created_at }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <a href="{{ route('admin.languages.edit', $language) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                    <x-heroicon-s-pencil class="w-4 h-4"/>
                                    <span>{{ __('Edit') }}</span>
                                </a>
                                @if(!$language->default)
                                    <button type="button" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 shadow-sm bg-white text-gray-800 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                        <span>{{ __('Delete') }}</span>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="border-t border-gray-100">
                            <td class="py-6 px-6 text-center text-gray-500" colspan="5">{{ __('Empty Data.') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            {{ $languages->withQueryString()->links('partials.admin.pagination') }}
        </div>
    </div>
@endsection
