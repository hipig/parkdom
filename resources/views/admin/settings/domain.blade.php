@extends('layouts.admin')
@section('title', '系统设置-域名')

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="settingContainer">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>域名设置</h3>
        </div>
        <form action="{{ route('admin.settings.domain') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="currency" class="text-gray-900 font-semibold">币种</label>
                        <select id="currency" name="currency" x-model="currency" class="w-full block border border-gray-200 rounded px-3 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            <template x-for="currency in currencyList">
                                <option x-text="currency.code"></option>
                            </template>
                        </select>
                        <p class="text-sm text-gray-500">为您的新域名设置默认币种</p>
                    </div>
                    <div class="space-y-1">
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
                        <p class="text-sm text-gray-500">允许客户报价</p>
                    </div>
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
                        <p class="text-sm text-gray-500">仅适用于启用了“允许报价”的域名</p>
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    确定
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('settingContainer', () => ({
                currencyList: [],
                currency: '',
                currencyPrefix: '',
                allowOffer: '{{ old('allow_offer', $setting->allow_offer ?? 1) }}',

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
                            this.currency = '{{ old('currency', $setting->currency) }}'
                        })
                }
            }))
        })
    </script>
@endpush
