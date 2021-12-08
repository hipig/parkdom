@extends('layouts.admin')
@section('title', '报价统计')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">概述统计</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>报价</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="monthlyCountContainer">
            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                <h3>月度报价次数</h3>
            </div>
            <div class="flex-grow w-full">
                <div class="w-full h-96" x-ref="monthly-count-chart"></div>
            </div>
        </div>
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden" x-data="monthlyPriceContainer">
            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                <h3>月度报价金额</h3>
            </div>
            <div class="flex-grow w-full">
                <div class="w-full h-96" x-ref="monthly-price-chart"></div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ mix('vendor/echarts/echarts.js') }}"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('monthlyCountContainer', () => ({
                myChart: null,

                init() {
                    this.myChart = echarts.init(this.$refs['monthly-count-chart'])
                    let option = {
                        xAxis: {
                            type: 'category',
                            data: @json($monthlyCount->keys())
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                data: @json($monthlyCount->values()),
                                type: 'line',
                                smooth: true
                            }
                        ],
                        tooltip: {
                            trigger: 'item'
                        }
                    };

                    this.myChart.setOption(option)
                }
            }))

            Alpine.data('monthlyPriceContainer', () => ({
                myChart: null,

                init() {
                    this.myChart = echarts.init(this.$refs['monthly-price-chart'])
                    let option = {
                        xAxis: {
                            type: 'category',
                            data: @json($monthlyPrice->keys())
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                data: @json($monthlyPrice->values()),
                                type: 'line',
                                smooth: true
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
