@extends('layouts.admin')
@section('title', '域名添加')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">域名管理</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.domains.index') }}">域名</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>添加</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>域名添加</h3>
        </div>
        <form x-data="formContainer" action="{{ route('admin.domains.store') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="domains" class="text-gray-900 font-semibold"><span class="text-red-600 px-1">*</span>域名</label>
                        <textarea id="domains" name="domains" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4" placeholder="Example.com
Example.net"></textarea>
                        <p class="text-sm text-gray-500">一行一个域名</p>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-2 space-y-1">
                            <label for="price" class="text-gray-900 font-semibold">价格</label>
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 relative">
                                    <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                        <span class="text-gray-500" x-text="currencyPrefix"></span>
                                    </div>
                                    <input type="text" id="price" name="price" value="{{ old('price') }}" class="block border border-gray-200 rounded pl-8 pr-16 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入价格">
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                        <label for="currency" class="sr-only">Currency</label>
                                        <select id="currency" name="currency" x-model="currency" class="h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                            <template x-for="currency in currencyList">
                                                <option x-text="currency.code">CAD</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500">立即购买的价格</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-2 space-y-1">
                            <label for="offer_status" class="text-gray-900 font-semibold">允许报价</label>
                            <div class="flex items-center space-x-6">
                                <label class="flex items-center">
                                    <input type="radio" name="allow_offer" value="1" x-model="allowOffer" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                    <span class="ml-2">启用</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="allow_offer" value="2" x-model="allowOffer" class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                    <span class="ml-2">禁用</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-2 space-y-1" x-show="allowOffer == 1">
                            <label for="min_price" class="text-gray-900 font-semibold">最低价格</label>
                            <div class="flex items-center">
                                <div class="flex-1 min-w-0 relative">
                                    <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                        <span class="text-gray-500" x-text="currencyPrefix"></span>
                                    </div>
                                    <input type="text" id="min_price" name="min_price" value="{{ old('min_price') }}" class="block border border-gray-200 rounded pl-8 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入最低价格">
                                </div>
                            </div>
                            <p class="text-sm text-gray-500">最低报价的金额</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50 space-x-2">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    确定
                </button>
                <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    返回
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('formContainer', () => ({
                currencyList: [],
                currency: '',
                currencyPrefix: '',
                allowOffer: '{{ old('all_offer', $setting->allow_offer ?? 1) }}',

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
                        this.currency = '{{ $setting->currency }}' || res.data[0].code
                    })
                }
            }))
        })
    </script>
@endpush
