@extends('layouts.admin')
@section('title', '语言列表')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.languages.index') }}">语言</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>列表</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
            <form action="{{ route('admin.languages.index') }}" method="get" class="space-y-3 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                <div class="flex items-center space-x-1">
                    <label for="name" class="flex-shrink-0 text-sm">编码：</label>
                    <input type="text" id="name" name="code" value="{{ old('code', request()->code) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="编码">
                </div>
                <div class="flex items-center space-x-1">
                    <label for="name" class="flex-shrink-0 text-sm">名称：</label>
                    <input type="text" id="name" name="name" value="{{ old('name', request()->name) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="关键字">
                </div>
                <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>搜索</span>
                </button>
                <a href="{{ route('admin.languages.index') }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>清空</span>
                </a>
            </form>
        </div>
    </div>
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900">域名分类</span>
                <div class="space-x-2">
                    <a href="{{ route('admin.languages.create') }}" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
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
                        <th class="py-2 px-6">名称</th>
                        <th class="py-2 px-6">编码</th>
                        <th class="py-2 px-6 text-center">状态</th>
                        <th class="py-2 px-6">创建时间</th>
                        <th class="py-2 px-6">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($languages as $language)
                        <tr class="border-t border-gray-100">
                            <td class="py-3 px-6">
                                <span class="text-gray-700">{{ $language->name }}</span>
                                @if($language->default)
                                    <span class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded-full text-indigo-700 bg-indigo-200">默认</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">
                                <div class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded text-gray-600 bg-gray-100">{{ $language->code }}</div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                @if($language->status)
                                    <span class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded-full text-green-700 bg-green-200">启用</span>
                                @else
                                    <span class="font-semibold inline-flex px-2 py-1 leading-4 text-sm rounded-full text-red-700 bg-red-200">禁用</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $language->created_at }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <a href="{{ route('admin.languages.edit', $language) }}" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                    <x-heroicon-s-pencil class="w-4 h-4"/>
                                    <span>编辑</span>
                                </a>
                                @if(!$language->default)
                                    <button type="button" class="inline-flex justify-center items-center space-x-1 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 shadow-sm bg-white text-gray-800 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <x-heroicon-s-trash class="w-4 h-4"/>
                                        <span>删除</span>
                                    </button>
                                @endif
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
            {{ $languages->withQueryString()->links('partials.admin.pagination') }}
        </div>
    </div>
@endsection
