@extends('layouts.admin')
@section('title', '概况统计-访问记录')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">概况统计</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.domainVisits.index') }}">访问记录</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>列表</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-900">访问记录</span>
            </div>
        </div>
        <div class="flex-grow w-full">
            <div class="border-t border-b border-gray-100 overflow-x-auto min-w-full bg-white">
                <table class="min-w-full text-sm align-middle whitespace-nowrap">
                    <thead>
                    <tr class="text-gray-700 text-left bg-gray-50 font-semibold text-left">
                        <th class="py-2 px-6">域名</th>
                        <th class="py-2 px-6">Host</th>
                        <th class="py-2 px-6">IP</th>
                        <th class="py-2 px-6">设备</th>
                        <th class="py-2 px-6">设备类型</th>
                        <th class="py-2 px-6">平台</th>
                        <th class="py-2 px-6">浏览器</th>
                        <th class="py-2 px-6">创建时间</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($visits as $visit)
                        <tr class="border-t border-gray-100">
                            <td class="py-3 px-6">
                                <a href="{{ route('admin.domains.show', $visit->domain) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline" target="_blank">{{ $visit->domain->domain }}</a>
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-900">{{ $visit->host }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <div class="text-gray-700">{{ $visit->ip }}</div>
                                <div class="text-gray-500">{{ $visit->country }}</div>
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $visit->device }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $visit->device_type }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $visit->platform }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $visit->browser }}</span>
                            </td>
                            <td class="py-3 px-6">
                                <span class="text-gray-500">{{ $visit->created_at }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr class="border-t border-gray-100">
                            <td class="py-6 px-6 text-center text-gray-500" colspan="8">暂无数据。</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            {{ $visits->withQueryString()->links('partials.admin.pagination') }}
        </div>
    </div>
@endsection
