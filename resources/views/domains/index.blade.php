@extends('layouts.app')
@section('title', __('Domains'))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Domains') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
            <form action="{{ route('domains.index') }}" method="get" class="space-y-3 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                <div class="flex items-center space-x-2">
                    <label for="domain" class="flex-shrink-0 font-medium text-sm">{{ __('Domain') }}</label>
                    <input type="text" id="domain" name="domain" value="{{ old('domain', request()->domain) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Domain') }}">
                </div>
                <div class="flex items-center space-x-2">
                    <label for="category_id" class="flex-shrink-0 font-medium text-sm">{{ __('Category') }}</label>
                    <select id="category_id" name="category_id" class="w-36 block border border-gray-200 rounded px-3 py-2 leading-5 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" {{ empty(request()->category_id) ? 'selected' : '' }}>{{ __('Category') }}</option>
                    </select>
                </div>
                <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Search') }}</span>
                </button>
                <a href="{{ route('domains.index') }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
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
                    <a href="javascript:;" x-data @click="$dispatch('open-create-modal', { open: true })" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
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

    <div x-data="createContainer" x-cloak>
        <div
            x-show="open"
            @open-create-modal.window="openModal($event.detail)"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="transform opacity-100"
            x-transition:leave-end="transform opacity-0"
            class="z-90 fixed inset-0 overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-75 p-4 lg:p-8"
        >
            <div
                class="flex flex-col rounded shadow-sm bg-white overflow-hidden w-full max-w-lg mx-auto"
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-125"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-125"
                @click.outside="closeModal"
            >
                <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 flex justify-between items-center">
                    <h3 class="font-medium">
                        {{ __('New Domain') }}
                    </h3>
                    <div class="-my-4">
                        <button
                            type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-transparent text-gray-600 hover:text-gray-400 focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:text-gray-600"
                            @click="closeModal"
                        >
                            <svg class="hi-solid hi-x inline-block w-4 h-4 -mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        </button>
                    </div>
                </div>
                <form action="{{ route('domains.store') }}" method="post">
                    @csrf
                    <div class="p-5 lg:p-6 flex-grow w-full">
                        <div class="space-y-6">
                            <div class="space-y-1">
                                <label for="domains" class="text-gray-900 font-semibold"><span class="text-red-600 px-1">*</span>{{ __('Domain') }}</label>
                                <textarea id="domains" name="domains" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="Example.com
Example.net"></textarea>
                                <p class="text-sm text-gray-500">{{ __('Multiple domains, please wrap.') }}</p>
                            </div>
                            <div class="space-y-1">
                                <label for="price" class="text-gray-900 font-semibold">{{ __('Price') }}</label>
                                <div class="flex items-center">
                                    <div class="flex-1 min-w-0 relative">
                                        <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                            <span class="text-gray-500" x-text="currencyPrefix"></span>
                                        </div>
                                        <input type="text" id="price" name="price" value="{{ old('price') }}" class="block border border-gray-200 rounded pl-8 pr-16 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Price') }}">
                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                            <label for="currency" class="sr-only">{{ __('Currency') }}</label>
                                            <select id="currency" name="currency" x-model="currency" class="h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                                <template x-for="currency in currencyList">
                                                    <option x-text="currency.code"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500">{{ __('Buy now price') }}</p>
                            </div>
                            <div class="space-y-1">
                                <label for="offer_status" class="text-gray-900 font-semibold">{{ __('Allow Offer') }}</label>
                                <div class="flex items-center space-x-6">
                                    <label class="flex items-center">
                                        <input type="radio" name="allow_offer" value="1" x-model="allowOffer" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                        <span class="ml-2">{{ __('Enabled') }}</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="allow_offer" value="2" x-model="allowOffer" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                        <span class="ml-2">{{ __('Disabled') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="space-y-1" x-show="allowOffer == 1">
                                <label for="min_price" class="text-gray-900 font-semibold">{{ __('Min Price') }}</label>
                                <div class="flex items-center">
                                    <div class="flex-1 min-w-0 relative">
                                        <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                            <span class="text-gray-500" x-text="currencyPrefix"></span>
                                        </div>
                                        <input type="text" id="min_price" name="min_price" value="{{ old('min_price') }}" class="block border border-gray-200 rounded pl-8 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Min Price') }}">
                                    </div>
                                </div>
                                <p class="text-sm text-gray-500">{{ __('Min price for offer') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 text-right space-x-1">
                        <button
                            type="button"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-transparent text-indigo-600 hover:text-indigo-400 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:text-indigo-600"
                            @click="closeModal"
                        >
                            <span>{{ __('Cancel') }}</span>
                        </button>
                        <button
                            type="submit"
                            class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700"
                        >
                            <span>{{ __('Submit') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('createContainer', () => ({
                open:false,
                currencyList: [],
                currency: '',
                currencyPrefix: '',
                allowOffer: 1,

                init() {
                    this.getCurrencyList()

                    this.$watch('currency', (currency) => {
                        let index = _.findKey(this.currencyList, { code: currency })
                        this.currencyPrefix = this.currencyList[index].prefix
                    })
                },

                openModal(detail) {
                    this.open = !!detail.open
                },
                closeModal() {
                    this.open = false
                },

                getCurrencyList() {
                    axios.get(`{{ route('api.currencies') }}`)
                        .then(res => {
                            this.currencyList = res.data
                            this.currency = res.data[0].code
                        })
                }
            }))
        })
    </script>
@endpush
