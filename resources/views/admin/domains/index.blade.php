@extends('layouts.admin')
@section('title', '域名列表')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">域名管理</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.domains.index') }}">域名</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>列表</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900">域名列表</span>
                <div class="space-x-2">
                    <a href="{{ route('admin.domains.create') }}" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                        添加
                    </a>
                </div>
            </div>
        </div>
        <div class="flex-grow w-full">
            <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                <table class="min-w-full text-sm align-middle whitespace-nowrap">
                    <thead>
                    <tr class="text-gray-700 text-left bg-gray-50 font-semibold">
                        <th class="py-2 px-6 text-center" width="120">分类</th>
                        <th class="py-2 px-6">域名</th>
                        <th class="py-2 px-6 text-center" width="120">价格</th>
                        <th class="py-2 px-6 text-center" width="120">最低价格</th>
                        <th class="py-2 px-6 text-center" width="80">允许报价</th>
                        <th class="py-2 px-6" width="150">创建时间</th>
                        <th class="py-2 px-6" width="150">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($domains as $domain)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 px-6 text-center">
                                    @if($domain->category)
                                        <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $domain->category->name }}</a>
                                    @else
                                        <span class="text-gray-400 border-b border-dashed border-gray-300">未分类</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <a href="{{ $domain->url }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $domain->domain }}</a>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($domain->price)
                                        <span class="text-red-600">{{ optional($domain->priceCurrency)->prefix }} {{ $domain->price }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($domain->min_price)
                                        <span class="text-red-600">{{ optional($domain->priceCurrency)->prefix }} {{ $domain->min_price }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($domain->allow_offer == \App\Models\Domain::STATUS_ENABLE)
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-green-800 bg-green-100">是</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-red-800 bg-red-100">否</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $domain->created_at }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('admin.domains.edit', $domain) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                        <span>编辑</span>
                                    </a>
                                    <a href="#" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                        <span>删除</span>
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
            {{ $domains->withQueryString()->links('partials.admin.pagination') }}
        </div>
    </div>
@endsection
