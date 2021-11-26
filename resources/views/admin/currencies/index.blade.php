@extends('layouts.admin')
@section('title', '系统设置-币种')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">系统设置</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.settings.currencies.index') }}">币种</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>列表</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900">币种</span>
                <div class="space-x-2">
                    <a href="{{ route('admin.settings.currencies.create') }}" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                        添加
                    </a>
                </div>
            </div>
        </div>
        <div class="flex-grow w-full">
            <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                <table class="min-w-full text-sm align-middle whitespace-nowrap">
                    <thead>
                    <tr class="text-gray-700 bg-gray-50 font-semibold text-left">
                        <th class="py-2 px-6">编码</th>
                        <th class="py-2 px-6">前缀</th>
                        <th class="py-2 px-6 text-center">状态</th>
                        <th class="py-2 px-6">创建时间</th>
                        <th class="py-2 px-6">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($currencies as $currency)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 px-6">
                                    <span class="text-gray-700">{{ $currency->code }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $currency->prefix }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if($currency->status == \App\Models\Currency::STATUS_ENABLE)
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-green-800 bg-green-100">启用</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full py-1 px-2.5 text-sm leading-none text-red-800 bg-red-100">禁用</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6">
                                    <span class="text-gray-500">{{ $currency->created_at }}</span>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{ route('admin.settings.currencies.edit', $currency) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-pencil class="w-4 h-4"/>
                                        <span>编辑</span>
                                    </a>
                                    <button type="button" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                        <span>删除</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-gray-100">
                                <td class="py-6 px-6 text-center text-gray-500" colspan="5">暂无数据。</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            {{ $currencies->withQueryString()->links('partials.admin.pagination') }}
        </div>
    </div>
@endsection
