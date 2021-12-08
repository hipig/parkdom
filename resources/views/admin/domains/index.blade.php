@extends('layouts.admin')
@section('title', __('Domains'))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Domains') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
            <form action="{{ route('admin.domains.index') }}" method="get" class="space-y-3 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                <div class="flex items-center space-x-2">
                    <label for="domain" class="flex-shrink-0 font-medium text-sm">{{ __('Domain') }}</label>
                    <input type="text" id="domain" name="domain" value="{{ old('domain', request()->domain) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Domain') }}">
                </div>
                <div class="flex items-center space-x-2">
                    <label for="category_id" class="flex-shrink-0 font-medium text-sm">{{ __('Category') }}</label>
                    <select id="category_id" name="category_id" class="w-36 block border border-gray-200 rounded px-3 py-2 leading-5 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" {{ empty(request()->category_id) ? 'selected' : '' }}>{{ __('Category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Search') }}</span>
                </button>
                <a href="{{ route('admin.domains.index') }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ __('Clear') }}</span>
                </a>
            </form>
        </div>
    </div>
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900 font-medium">{{ __('Domains') }}</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.domains.create') }}" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
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
                        <th class="py-2 px-6 text-center">{{ __('Category') }}</th>
                        <th class="py-2 px-6">{{ __('Domain') }}</th>
                        <th class="py-2 px-6 text-center">{{ __('Price') }}</th>
                        <th class="py-2 px-6 text-center">{{ __('Min Price') }}</th>
                        <th class="py-2 px-6 text-center">{{ __('Allow Offer') }}</th>
                        <th class="py-2 px-6">{{ __('Created at') }}</th>
                        <th class="py-2 px-6">{{ __('Action') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($domains as $domain)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 px-6 text-center">
                                    @if($domain->category)
                                        <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $domain->category->name }}</a>
                                    @else
                                        <span class="text-gray-400 border-b border-dashed border-gray-300">{{ __('Empty') }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <a href="{{ route('admin.domains.show', $domain) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $domain->domain }}</a>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($domain->price)
                                        <span class="text-red-600">{{ $domain->format_price }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($domain->min_price)
                                        <span class="text-red-600">{{ $domain->format_min_price }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($domain->allow_offer == \App\Models\Domain::STATUS_ENABLE)
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-green-800 bg-green-100">{{ __('Enable') }}</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-red-800 bg-red-100">{{ __('Disable') }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $domain->created_at }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('admin.domains.edit', $domain) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                        <span>{{ __('Edit') }}</span>
                                    </a>
                                    <a href="#" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                        <span>{{ __('Delete') }}</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-gray-100">
                                <td class="py-6 px-6 text-center text-gray-500" colspan="7">{{ __('Empty Data.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            {{ $domains->withQueryString()->links('partials.pagination') }}
        </div>
    </div>
@endsection
