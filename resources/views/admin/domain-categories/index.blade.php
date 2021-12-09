@extends('layouts.admin')
@section('title', __('Categories'))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Categories') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
            <form action="{{ route('admin.domainCategories.index') }}" method="get" class="space-y-3 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                <div class="flex items-center space-x-1">
                    <label for="name" class="flex-shrink-0 font-medium text-sm">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', request()->name) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Name') }}">
                </div>
                <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Search') }}</span>
                </button>
                <a href="{{ route('admin.domainCategories.index') }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ __('Clear') }}</span>
                </a>
            </form>
        </div>
    </div>
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900 font-medium">{{ __('Domain Categories') }}</span>
                <div class="space-x-2">
                    <a href="{{ route('admin.domainCategories.create') }}" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                        <span>{{ __('New') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex-grow w-full">
            <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                <table class="min-w-full text-sm align-middle whitespace-nowrap">
                    <thead>
                    <tr class="text-gray-700 text-left bg-gray-50 font-semibold">
                        <th class="py-2 px-6">{{ __('Name') }}</th>
                        <th class="py-2 px-6">{{ __('Icon') }}</th>
                        <th class="py-2 px-6 text-center">{{ __('Status') }}</th>
                        <th class="py-2 px-6">{{ __('Created at') }}</th>
                        <th class="py-2 px-6">{{ __('Action') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 px-6">
                                    <span class="text-gray-700">{{ $category->name }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $category->icon }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($category->status == \App\Models\DomainCategory::STATUS_ENABLE)
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-green-800 bg-green-100">{{ __('Enable') }}</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-red-800 bg-red-100">{{ __('Disable') }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $category->created_at }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('admin.domainCategories.edit', $category) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                        <span>{{ __('Edit') }}</span>
                                    </a>
                                    <button type="button" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                        <span>{{ __('Delete') }}</span>
                                    </button>
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
            {{ $categories->withQueryString()->links('partials.pagination') }}
        </div>
    </div>
@endsection
