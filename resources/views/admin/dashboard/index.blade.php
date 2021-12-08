@extends('layouts.admin')
@section('title', __('Dashboard'))

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        {{ $count['latest_visit'] }}
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('New Visits') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-eye class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="{{ route('admin.domainVisits.index') }}" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Domain Visits') }}
            </a>
        </div>
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        {{ $count['latest_offer'] }}
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('New Offers') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-currency-dollar class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="{{ route('admin.offers.index') }}" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Offers') }}
            </a>
        </div>
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        {{ $count['domain_category'] }}
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('Domain Categories') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-folder-open class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="{{ route('admin.domainCategories.index') }}" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Domain Categories') }}
            </a>
        </div>
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full flex justify-between items-center">
                <dl>
                    <dt class="text-2xl font-semibold">
                        {{ $count['domain'] }}
                    </dt>
                    <dd class="uppercase font-medium text-sm text-gray-500 tracking-wider">
                        {{ __('Domains') }}
                    </dd>
                </dl>
                <div class="flex justify-center items-center rounded-xl w-12 h-12 bg-indigo-50">
                    <x-heroicon-s-globe-alt class="w-8 h-8 text-indigo-600"/>
                </div>
            </div>
            <a href="{{ route('admin.domains.index') }}" class="block p-3 font-medium text-sm text-center bg-gray-50 hover:bg-gray-100 hover:bg-opacity-75 active:bg-gray-50 text-indigo-600 hover:text-indigo-500">
                {{ __('Domains') }}
            </a>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <div>
            <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
                <div class="py-4 px-5 lg:px-6 flex-grow w-full">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-900 font-semibold">{{ __('New Visits') }}</span>
                    </div>
                </div>
                <div class="flex-grow w-full -mb-px">
                    <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                        <table class="min-w-full text-sm align-middle whitespace-nowrap">
                            <thead>
                            <tr class="text-gray-700 text-left bg-gray-50 font-semibold text-left">
                                <th class="py-2 px-6">{{ __('Domain') }}</th>
                                <th class="py-2 px-6">{{ __('IP') }}</th>
                                <th class="py-2 px-6">{{ __('Platform') }}</th>
                                <th class="py-2 px-6">{{ __('Created at') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($latestVisits as $visit)
                                <tr class="border-t border-gray-100">
                                    <td class="py-3 px-6">
                                        <a href="{{ route('admin.domains.show', $visit->domain) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $visit->domain->domain }}</a>
                                        <p class="text-gray-500">{{ $visit->host }}</p>
                                    </td>
                                    <td class="py-3 px-6">
                                        <p class="text-gray-700">{{ $visit->ip }}</p>
                                        <p class="text-gray-500">{{ $visit->country }}</p>
                                    </td>
                                    <td class="py-3 px-6">
                                        <p class="text-gray-700">{{ $visit->platform }}</p>
                                        <p class="text-gray-500">{{ $visit->browser }}</p>
                                    </td>
                                    <td class="py-3 px-6">
                                        <span class="text-gray-500">{{ $visit->created_at }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-t border-gray-100">
                                    <td class="py-6 px-6 text-center text-gray-500" colspan="4">{{ __('Empty Data.') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
                <div class="py-4 px-5 lg:px-6 flex-grow w-full">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-900 font-semibold">{{ __('New Offers') }}</span>
                    </div>
                </div>
                <div class="flex-grow w-full -mb-px">
                    <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                        <table class="min-w-full text-sm align-middle whitespace-nowrap">
                            <thead>
                            <tr class="text-gray-700 text-left bg-gray-50 font-semibold text-left">
                                <th class="py-2 px-6">{{ __('Domains') }}</th>
                                <th class="py-2 px-6">{{ __('Name') }}</th>
                                <th class="py-2 px-6">{{ __('Created at') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($latestOffers as $offer)
                                <tr class="border-t border-gray-100">
                                    <td class="py-3 px-6">
                                        <a href="{{ route('admin.domains.show', $offer->domain) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $offer->domain->domain }}</a>
                                        <p class="text-red-500">{{ $offer->format_offer_price }}</p>
                                    </td>
                                    <td class="py-3 px-6">
                                        <p class="text-gray-700">{{ $offer->name }}</p>
                                        <p class="text-gray-500">{{ $offer->email }}</p>
                                    </td>
                                    <td class="py-3 px-6">
                                        <span class="text-gray-500">{{ $offer->created_at }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-t border-gray-100">
                                    <td class="py-6 px-6 text-center text-gray-500" colspan="4">{{ __('Empty Data.') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
