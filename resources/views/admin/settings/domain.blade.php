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
                    <div class="space-y-1" x-show="allowOffer == 1">
                        <label for="min_price" class="text-gray-900 font-semibold">最低价格</label>
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 relative">
                                <div class="absolute inset-y-0 left-0 w-8 my-px ml-px flex items-center justify-center pointer-events-none rounded-l">
                                    <span class="text-gray-500" x-text="currencyPrefix"></span>
                                </div>
                                <input type="text" id="min_price" name="min_price" value="{{ old('min_price', $setting->min_price) }}" class="block border border-gray-200 rounded pl-8 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入最低价格">
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">仅适用于启用了“允许报价”的域名</p>
                    </div>
                    <div class="space-y-1" x-data="buyLinkContainer">
                        <label for="notify_email" class="text-gray-900 font-semibold space-x-1">
                            <span>购买按钮</span>
                            <button type="button" class="text-sm text-gray-500 px-2 border border-gray-200 hover:bg-gray-50 rounded shadow-sm" @click="addItem">增加一个</button>
                        </label>
                        <div class="border border-gray-200 rounded divide-y divide-gray-200" @drop.prevent="drop" @dragover.prevent="dragover($event)">
                            <template x-for="(link, i) in linkList" hidden>
                                <div class="flex p-4 hover:bg-gray-50 relative" :class="{ 'opacity-50': dragging === i }" :draggable="dragging === i">
                                    <div class="flex-shrink-0 cursor-move" @mousedown="mousedown(i)" @mouseup="mouseup">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 110-2h4a1 1 0 011 1v4a1 1 0 11-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 112 0v1.586l2.293-2.293a1 1 0 011.414 1.414L6.414 15H8a1 1 0 110 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 110-2h1.586l-2.293-2.293a1 1 0 011.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-grow ml-4">
                                        <div class="space-y-1">
                                            <div class="text-gray-700 font-semibold" x-text="link.title"></div>
                                            <input type="hidden" :name="'buy_links['+i+'][title]'" x-model="link.title" hidden>
                                            <div class="grid grid-cols-3 gap-4">
                                                <div class="space-y-1">
                                                    <label for="" class="text-sm font-semibold">按钮名称</label>
                                                    <input type="text" :name="'buy_links['+i+'][label]'" x-model="link.label" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="Buy with paypal">
                                                </div>
                                                <div class="col-span-2">
                                                    <div class="space-y-1">
                                                        <label for="" class="text-sm font-semibold">按钮链接</label>
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 left-0 w-11 my-px ml-px flex items-center justify-center pointer-events-none rounded-l bg-gray-100 border-r border-gray-200">
                                                                <span class="text-sm text-gray-500">URL</span>
                                                            </div>
                                                            <input type="text" :name="'buy_links['+i+'][value]'" x-model="link.value" class="block border border-gray-200 rounded pl-14 pr-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="https://paypal.com/{domain}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute top-0 right-0 p-3 cursor-pointer" title="删除" @click="removeItem(i)">
                                        <x-heroicon-s-trash class="w-6 h-6 text-red-500"/>
                                    </div>
                                    <div class="absolute inset-0 opacity-50" x-show.transition="dragging !== null" :class="{ 'bg-indigo-200': dropping === i }" @dragenter.prevent="dragenter(i)" @dragleave="dragleave(i)"></div>
                                </div>
                            </template>
                        </div>
                        <p x-show="linkList.length > 0" class="text-sm text-gray-500"><span class="text-red-500">{domain}</span> 将自动替换为当前域名</p>
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

            Alpine.data('buyLinkContainer', () => ({
                linkList: @json(json_decode($setting->buy_links)),
                dragging: null,
                dropping: null,

                init() {
                    this.$watch('dragging', value => {
                        console.log('dragging:', value)
                    })
                    this.$watch('dropping', value => {
                        console.log('dropping:', value)
                    })
                },

                addItem() {
                    this.linkList = this.linkList.concat({
                        title: '自定义按钮',
                        label: '',
                        value: ''
                    })
                },
                removeItem(index) {
                    this.linkList.splice(index, 1)
                },

                drop() {
                    let { linkList, dragging, dropping } = this

                    if (dragging !== null && dropping !== null) {
                        if (dragging < dropping)
                            linkList = [...linkList.slice(0, dragging), ...linkList.slice(dragging + 1, dropping + 1), linkList[dragging], ...linkList.slice(dropping + 1)]
                        else
                            linkList = [...linkList.slice(0, dropping), linkList[dragging], ...linkList.slice(dropping, dragging), ...linkList.slice(dragging + 1)]
                    }
                    this.linkList = linkList
                    this.dragging = null
                    this.dropping = null
                },
                dragover(e) {
                    e.dataTransfer.dropEffect = 'move'
                },

                mousedown(index) {
                    this.dragging = index
                },
                mouseup() {
                    this.dragging = null
                },
                dragenter(index) {
                    if (index !== this.dragging) this.dropping = index
                },
                dragleave(index) {
                    if (index === this.dropping) this.dropping = null
                }
            }))
        })
    </script>
@endpush
