@extends('layouts.admin')
@section('title', joinTitle([__('Edit'), __('Domains')]))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.domains.index') }}">{{ __('Domains') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Edit') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="updateContainer">
        <nav class="flex items-center bg-gray-50 space-x-1">
            <a href="javascript:;" @click="switchTab('domain')" :class="[activeTab === 'domain' ? 'font-semibold text-indigo-500 border-indigo-500' : 'text-gray-500 border-transparent hover:text-indigo-500 active:text-gray-500']" class="px-3 md:px-6 -mb-px flex items-center space-x-2 py-4 border-b-2">
                {{ __('Domain') }}
            </a>
            <a href="javascript:;" @click="switchTab('pricing')" :class="[activeTab === 'pricing' ? 'font-semibold text-indigo-500 border-indigo-500' : 'text-gray-500 border-transparent hover:text-indigo-500 active:text-gray-500']" class="px-3 md:px-6 -mb-px flex items-center space-x-2 py-4 border-b-2">
                {{ __('Pricing') }}
            </a>
            <a href="javascript:;" @click="switchTab('template')" :class="[activeTab === 'template' ? 'font-semibold text-indigo-500 border-indigo-500' : 'text-gray-500 border-transparent hover:text-indigo-500 active:text-gray-500']" class="px-3 md:px-6 -mb-px flex items-center space-x-2 py-4 border-b-2">
                {{ __('Template') }}
            </a>
            <a href="javascript:;" @click="switchTab('setting')" :class="[activeTab === 'setting' ? 'font-semibold text-indigo-500 border-indigo-500' : 'text-gray-500 border-transparent hover:text-indigo-500 active:text-gray-500']" class="px-3 md:px-6 -mb-px flex items-center space-x-2 py-4 border-b-2">
                {{ __('Setting') }}
            </a>
        </nav>
        <form action="{{ route('admin.domains.update', $domain) }}" method="post">
            @csrf
            @method('put')
            <div class="p-5 lg:p-6 flex-grow w-full" x-show="activeTab === 'domain'">
                <div class="space-y-6 md:w-2/3">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="text-gray-900 font-semibold">{{ __('Domain') }}</label>
                            <div class="py-2 leading-6 text-2xl text-green-500 font-bold">{{ $domain->domain }}</div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-gray-900 font-semibold">{{ __('Suffix') }}</label>
                            <div class="py-2 leading-6">{{ $domain->suffix }}</div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-gray-900 font-semibold">{{ __('Length') }}</label>
                            <div class="py-2 leading-6">{{ $domain->length }}</div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-gray-900 font-semibold">{{ __('Age') }}</label>
                            <div class="py-2 leading-6">{{ __(':age year', ['age' => $domain->age]) }}</div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label for="currency" class="text-gray-900 font-semibold">{{ __('Category') }}</label>
                        <select id="currency" name="currency" :value="currency" @change="currencySelect($event.target.value)" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <option value="">{{ __('Category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label for="description" class="text-gray-900 font-semibold">{{ __('Description') }}</label>
                        <x-admin.form.translate name="description" :value="$domain->getTranslations('description')" type="textarea"></x-admin.form.translate>
                    </div>
                </div>
            </div>
            <div class="p-5 lg:p-6 flex-grow w-full" x-show="activeTab === 'pricing'">
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="currency" class="text-gray-900 font-semibold">{{ __('Currency') }}</label>
                        <select id="currency" name="currency" :value="currency" @change="currencySelect($event.target.value)" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <template x-for="currency in currencyList">
                                <option x-text="currency.code"></option>
                            </template>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label for="price" class="text-gray-900 font-semibold">{{ __('Price') }}</label>
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 relative">
                                <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                    <span class="text-gray-500" x-text="currencyPrefix"></span>
                                </div>
                                <input type="text" id="price" name="price" value="{{ old('price', $domain->price) }}" class="block border border-gray-200 rounded pl-8 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Price') }}">
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">{{ __('Buy now price') }}</p>
                    </div>
                    <div class="space-y-1">
                        <label for="offer_status" class="text-gray-900 font-semibold">{{ __('Allow Offer') }}</label>
                        <div class="flex items-center space-x-6">
                            <label class="flex items-center">
                                <input type="radio" name="allow_offer" value="1" x-model="allowOffer" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                <span class="ml-2">{{ __('Enable') }}</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="allow_offer" value="2" x-model="allowOffer" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                <span class="ml-2">{{ __('Disable') }}</span>
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
                                <input type="text" id="min_price" name="min_price" value="{{ old('min_price', $domain->min_price) }}" class="block border border-gray-200 rounded pl-8 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Min Price') }}">
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">{{ __('Min price for offer') }}</p>
                    </div>
                </div>
            </div>
            <div class="p-5 lg:p-6 flex-grow w-full" x-show="activeTab === 'template'">
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="template" class="text-gray-900 font-semibold">{{ __('Template') }}</label>
                        <select id="template" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            @foreach($themes as $theme)
                                <option>{{ $theme }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-5 lg:p-6 flex-grow w-full" x-show="activeTab === 'setting'">设置，开发中。。。</div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50 space-x-2">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Submit') }}</span>
                </button>
                <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ __('Back') }}</span>
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('updateContainer', () => ({
                currencyList: [],
                currency: '',
                currencyPrefix: '',
                activeTab: 'domain',
                allowOffer: '{{ old('all_offer', $domain->allow_offer ?? 1) }}',

                init() {
                    this.getCurrencyList()

                    this.$watch('currency', (currency) => {
                        let index = _.findKey(this.currencyList, { code: currency })
                        this.currencyPrefix = this.currencyList[index].prefix
                    })
                },

                getCurrencyList() {
                  axios.get(`{{ route('api.currencies') }}`)
                    .then(res => {
                        this.currencyList = res.data
                        this.currency = '{{ $domain->currency }}' || res.data[0].code
                    })
                },

                switchTab(value) {
                    this.activeTab = value
                }
            }))
        })
    </script>
@endpush
