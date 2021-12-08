@extends('layouts.admin')
@section('title', '访问统计')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">概述统计</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>访问</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="space-y-6">
        <h3 class="text-2xl text-gray-900">访问分布</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="countryCountContainer">
                    <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                        <h3>国家</h3>
                    </div>
                    <div class="py-6 flex-grow w-full">
                        <div class="w-full h-96" x-ref="country-count-chart"></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="deviceCountContainer">
                    <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                        <h3>设备</h3>
                    </div>
                    <div class="py-6 flex-grow w-full">
                        <div class="w-full h-96" x-ref="device-count-chart"></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="platformCountContainer">
                    <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                        <h3>平台</h3>
                    </div>
                    <div class="py-6 flex-grow w-full">
                        <div class="w-full h-96" x-ref="platform-count-chart"></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="browserCountContainer">
                    <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                        <h3>浏览器</h3>
                    </div>
                    <div class="py-6 flex-grow w-full">
                        <div class="w-full h-96" x-ref="browser-count-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('vendor/echarts/echarts.js') }}"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('countryCountContainer', () => ({
                myChart: null,

                init() {
                    this.myChart = echarts.init(this.$refs['country-count-chart'])
                    let option = {
                        series: [
                            {
                                type: 'pie',
                                radius: '50%',
                                data: @json($countryCount),
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip: {
                            trigger: 'item'
                        }
                    };

                    this.myChart.setOption(option)
                }
            }))

            Alpine.data('deviceCountContainer', () => ({
                myChart: null,

                init() {
                    this.myChart = echarts.init(this.$refs['device-count-chart'])
                    let option = {
                        series: [
                            {
                                type: 'pie',
                                radius: '50%',
                                data: @json($deviceCount),
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip: {
                            trigger: 'item'
                        }
                    };

                    this.myChart.setOption(option)
                }
            }))

            Alpine.data('platformCountContainer', () => ({
                myChart: null,

                init() {
                    this.myChart = echarts.init(this.$refs['platform-count-chart'])
                    let option = {
                        series: [
                            {
                                type: 'pie',
                                radius: ['40%', '70%'],
                                data: @json($platformCount),
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip: {
                            trigger: 'item'
                        }
                    };

                    this.myChart.setOption(option)
                }
            }))

            Alpine.data('browserCountContainer', () => ({
                myChart: null,

                init() {
                    this.myChart = echarts.init(this.$refs['browser-count-chart'])
                    let option = {
                        series: [
                            {
                                type: 'pie',
                                radius: ['40%', '70%'],
                                data: @json($browserCount),
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ],
                        tooltip: {
                            trigger: 'item'
                        }
                    };

                    this.myChart.setOption(option)
                }
            }))
        })
    </script>
@endpush
