@extends('layouts.admin')
@section('title', '域名编辑 ' . $domain->domain)

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">域名管理</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.domains.index') }}">域名</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>编辑</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>域名编辑 {{ $domain->domain }}</h3>
        </div>
        <div class="p-5 lg:p-6 flex-grow w-full">
            <form action="{{ route('admin.domains.edit', $domain) }}" method="post" class="space-y-6">
                <div hidden>
                    @csrf
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="domain" class="font-semibold py-2 md:w-1/5 flex-none md:mr-6 text-right"><span class="text-red-600 px-1">*</span>域名</label>
                    <input type="text" id="domain" name="domain" value="{{ old('domain', $domain->domain) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full md:w-3/5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入域名">
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="logo" class="font-semibold py-2 md:w-1/5 flex-none md:mr-6 text-right">LOGO</label>
                    <input type="text" id="logo" name="logo" value="{{ old('logo', $domain->logo) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full md:w-3/5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入LOGO">
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="estimated_price" class="font-semibold py-2 md:w-1/5 flex-none md:mr-6 text-right"><span class="text-red-600 px-1">*</span>预估价格</label>
                    <div class="w-full md:w-3/5 space-y-1">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 relative" x-data="toggleCurrencyContainer">
                                <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                    <span class="text-gray-500" x-text="currencyPrefix"></span>
                                </div>
                                <input type="text" id="estimated_price" name="estimated_price" value="{{ old('estimated_price', 0) }}" class="block border border-gray-200 rounded pl-8 pr-12 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入预估价格">
                                <div class="absolute inset-y-0 right-0 flex items-center">
                                    <label for="currency" class="sr-only">Currency</label>
                                    <select id="currency" name="currency" :value="currency" @change="currencySelect($event.target.value)" class="h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                        <template x-for="currency in currencyList">
                                            <option x-text="currency.code">CAD</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <p class="text-sm text-gray-500">价格为 <span class="text-red-500">0</span> 时不显示</p>
                    </div>
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="seo_title" class="font-semibold py-2 md:w-1/5 flex-none md:mr-6 text-right">网站标题</label>
                    <input type="text" id="seo_title" name="seo_title" value="{{ old('seo_title', $domain->seo_title) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full md:w-3/5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入网站标题">
                </div>
                <div class="space-y-1 md:space-y-0 md:flex md:items-center">
                    <label for="seo_keywords" class="font-semibold md:w-1/5 flex-none md:mr-6 text-right">网站关键词</label>
                    <input type="text" id="seo_keywords" name="seo_keywords" value="{{ old('seo_keywords', $domain->seo_keywords) }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full md:w-3/5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入网站关键词">
                </div>
                <div class="space-y-1 md:space-y-0 md:flex md:items-start">
                    <label for="seo_description" class="font-semibold md:w-1/5 flex-none md:mr-6 text-right">网站描述</label>
                    <textarea id="seo_description" name="seo_description" class="w-full md:w-3/5 block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="请输入网站描述">{{ old('seo_description', $domain->seo_description) }}</textarea>
                </div>
                <div class="md:w-4/5 ml-auto pl-6 space-x-2">
                    <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                        确定
                    </button>
                    <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                        返回
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('toggleCurrencyContainer', () => ({
                currencyList: [],
                currentCurrency: @json($domain->price_currency),
                currency: '',
                currencyPrefix: '',

                init() {
                    this.getCurrencyList()
                },

                getCurrencyList() {
                  axios.get(`{{ route('api.currencies') }}`)
                    .then(res => {
                        this.currencyList = res.data
                        let currentCurrency = this.currentCurrency || this.currencyList[0]
                        this.currency = currentCurrency.code
                        this.currencyPrefix = currentCurrency.prefix
                    })
                },

                currencySelect(value) {
                    let index = _.findKey(this.currencyList, { 'code': value})
                    let currentCurrency = this.currencyList[index]
                    this.currency = currentCurrency.code
                    this.currencyPrefix = currentCurrency.prefix
                }
            }))
        })
    </script>
@endpush
