@extends('layouts.admin')
@section('title', '报价列表')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.offers.index') }}">报价</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>列表</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900">报价列表</span>
            </div>
        </div>
        <div class="flex-grow w-full">
            <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                <table class="min-w-full text-sm align-middle whitespace-nowrap">
                    <thead>
                    <tr class="text-gray-700 bg-gray-50 font-semibold text-left">
                        <th class="py-2 px-6">域名</th>
                        <th class="py-2 px-6">姓名</th>
                        <th class="py-2 px-6">邮箱地址</th>
                        <th class="py-2 px-6">手机号码</th>
                        <th class="py-2 px-6">报价</th>
                        <th class="py-2 px-6">创建时间</th>
                        <th class="py-2 px-6">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($offers as $offer)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 px-6">
                                    <a href="{{ $offer->domain->url }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $offer->domain->domain }}</a>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-700">{{ $offer->name }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $offer->email }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $offer->phone }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-red-600 font-semibold">{{ $offer->format_offer_price }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $offer->created_at }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('admin.offers.show', $offer) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-eye class="w-4 h-4"/>
                                        <span>查看</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-gray-100">
                                <td class="py-6 px-6 text-center text-gray-500" colspan="7">暂无数据。</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            {{ $offers->withQueryString()->links('partials.admin.pagination') }}
        </div>
    </div>
@endsection
