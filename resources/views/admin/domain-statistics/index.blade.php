@extends('layouts.admin')
@section('title', __('Domain Statistics'))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Domain Statistics') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="visitContainer">
                <div class="py-3 px-5 lg:px-6 flex-grow w-full">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-900 font-medium">{{ __('Visit Ranking') }}</span>
                        <div class="space-x-2">
                            <a href="{{ route('admin.statistics.domain.visit.export') }}" class="inline-flex justify-center items-center space-x-1 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-green-700 bg-green-700 text-white hover:text-white hover:bg-green-800 hover:border-green-800 focus:ring focus:ring-green-500 focus:ring-opacity-50 active:bg-green-700 active:border-green-700">
                                <x-heroicon-s-download class="w-4 h-4"></x-heroicon-s-download>
                                <span>{{ __('Export') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-grow w-full">
                    <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                        <table class="min-w-full text-sm align-middle whitespace-nowrap">
                            <thead>
                            <tr class="text-gray-700 text-left bg-gray-50 font-semibold text-left">
                                <th class="py-2 px-6">{{ __('Domain') }}</th>
                                <th class="py-2 px-6 text-center">{{ __('Visits') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            <template x-for="visit in visitList">
                                <tr class="border-t border-gray-100">
                                    <td class="py-3 px-6">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank" x-text="visit.domain"></a>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="font-semibold inline-flex px-3 py-1 leading-4 text-sm rounded-full text-gray-700 bg-gray-100" x-text="visit.count"></div>
                                    </td>
                                </tr>
                            </template>
                            <template v-if="visitList.length === 0">
                                <tr class="border-t border-gray-100">
                                    <td class="py-6 px-6 text-center text-gray-500" colspan="2">{{ __('Empty Data.') }}</td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="py-3 px-5 lg:px-6 flex-grow w-full text-center">
                    <template x-if="!noMore">
                        <button type="button" @click="loadMore" class="font-medium text-sm text-indigo-600 hover:text-indigo-500 focus:outline-none">
                            {{ __('Load More') }}
                        </button>
                    </template>
                    <template x-if="noMore">
                        <span class="text-sm text-gray-500">{{ __('No More.') }}</span>
                    </template>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="hitContainer">
                <div class="py-3 px-5 lg:px-6 flex-grow w-full">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-900 font-medium">{{ __('Hit Ranking') }}</span>
                        <div class="space-x-2">
                            <a href="{{ route('admin.statistics.domain.hit.export') }}" class="inline-flex justify-center items-center space-x-1 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-green-700 bg-green-700 text-white hover:text-white hover:bg-green-800 hover:border-green-800 focus:ring focus:ring-green-500 focus:ring-opacity-50 active:bg-green-700 active:border-green-700">
                                <x-heroicon-s-download class="w-4 h-4"></x-heroicon-s-download>
                                <span>{{ __('Export') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-grow w-full">
                    <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                        <table class="min-w-full text-sm align-middle whitespace-nowrap">
                            <thead>
                            <tr class="text-gray-700 text-left bg-gray-50 font-semibold text-left">
                                <th class="py-2 px-6">{{ __('Domain') }}</th>
                                <th class="py-2 px-6 text-center">{{ __('Hits') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            <template x-for="hit in hitList">
                                <tr class="border-t border-gray-100">
                                    <td class="py-3 px-6">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank" x-text="hit.domain"></a>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="font-semibold inline-flex px-3 py-1 leading-4 text-sm rounded-full text-gray-700 bg-gray-100" x-text="hit.times"></div>
                                    </td>
                                </tr>
                            </template>
                            <template v-if="hitList.length === 0">
                                <tr class="border-t border-gray-100">
                                    <td class="py-6 px-6 text-center text-gray-500" colspan="2">{{ __('Empty Data.') }}</td>
                                </tr>
                            </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="py-3 px-5 lg:px-6 flex-grow w-full text-center">
                    <template x-if="!noMore">
                        <button type="button" @click="loadMore" class="font-medium text-sm text-indigo-600 hover:text-indigo-500 focus:outline-none">
                            {{ __('Load More') }}
                        </button>
                    </template>
                    <template x-if="noMore">
                        <span class="text-sm text-gray-500">{{ __('No More.') }}</span>
                    </template>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('visitContainer', () => ({
                page: 1,
                pageSize: 20,
                visitList: [],
                noMore: false,

                init() {
                    this.getVisitList()
                },
                loadMore() {
                    this.page++
                    this.getVisitList()
                },
                getVisitList() {
                    axios.get('{{ route('admin.statistics.domain.visit') }}', {
                            params: { page: this.page }
                        })
                        .then(res => {
                            this.visitList = this.visitList.concat(res.data.data)

                            if(res.data.data.length < this.pageSize) {
                                this.noMore = true
                            }
                        })
                }
            }))

            Alpine.data('hitContainer', () => ({
                page: 1,
                pageSize: 20,
                hitList: [],
                noMore: false,

                init() {
                    this.getHitList()
                },
                loadMore() {
                    this.page++
                    this.getHitList()
                },
                getHitList() {
                    axios.get('{{ route('admin.statistics.domain.hit') }}', {
                            params: { page: this.page }
                        })
                        .then(res => {
                            this.hitList = this.hitList.concat(res.data.data)

                            if(res.data.data.length < this.pageSize) {
                                this.noMore = true
                            }
                        })
                }
            }))
        })
    </script>
@endpush
