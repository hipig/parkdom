@extends('layouts.admin')
@section('title', '概况统计-访问记录')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">概况统计</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.domainVisits.index') }}">访问记录</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>列表</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
            <form action="{{ route('admin.domainVisits.index') }}" method="get" class="space-y-3 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                <div class="flex items-center space-x-1">
                    <label for="keyword" class="flex-shrink-0 text-sm">关键字：</label>
                    <input type="text" id="keyword" name="keyword" value="{{ old('keyword', request()->keyword) }}" class="block border border-gray-200 rounded px-3 py-2 leading-5 text-sm w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="Host/IP">
                </div>
                <div class="flex items-center space-x-1">
                    <label for="domain_id" class="flex-shrink-0 text-sm">域名：</label>
                    <select id="domain_id" name="domain_id" class="w-36 block border border-gray-200 rounded px-3 py-2 leading-5 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" {{ empty(request()->domain_id) ? 'selected' : '' }}>请选择</option>
                        @foreach($domains as $domain)
                            <option value="{{ $domain->id }}" {{ request()->domain_id == $domain->id ? 'selected' : '' }}>{{ $domain->domain }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center space-x-1">
                    <label for="device" class="flex-shrink-0 text-sm">设备：</label>
                    <select id="device" name="device" class="w-36 block border border-gray-200 rounded px-3 py-2 leading-5 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" {{ empty(request()->device) ? 'selected' : '' }}>请选择</option>
                        @foreach($devices as $device)
                            <option value="{{ $device }}" {{ request()->device == $device ? 'selected' : '' }}>{{ $device }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center space-x-1">
                    <label for="platform" class="flex-shrink-0 text-sm">平台：</label>
                    <select id="platform" name="platform" class="w-28 block border border-gray-200 rounded px-3 py-2 leading-5 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" {{ empty(request()->platform) ? 'selected' : '' }}>请选择</option>
                        @foreach($platforms as $platform)
                            <option value="{{ $platform }}" {{ request()->platform == $platform ? 'selected' : '' }}>{{ $platform }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center space-x-1">
                    <label for="device" class="flex-shrink-0 text-sm">浏览器：</label>
                    <select id="device" name="device" class="w-28 block border border-gray-200 rounded px-3 py-2 leading-5 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="" {{ empty(request()->browser) ? 'selected' : '' }}>请选择</option>
                        @foreach($browsers as $browser)
                            <option value="{{ $browser }}" {{ request()->browser == $browser ? 'selected' : '' }}>{{ $browser }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Search') }}</span>
                </button>
                <a href="{{ route('admin.domainVisits.index') }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ __('Clear') }}</span>
                </a>
            </form>
        </div>
    </div>
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 flex-grow w-full">
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
                        <th class="py-2 px-6">{{ __('Created at') }}</th>
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
                                <p class="text-gray-700">{{ $visit->ip }}</p>
                                <p class="text-gray-500">{{ $visit->country }}</p>
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
                            <td class="py-6 px-6 text-center text-gray-500" colspan="8">{{ __('Empty Data.') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-3 px-5 lg:px-6 flex-grow w-full">
            {{ $visits->withQueryString()->links('partials.pagination') }}
        </div>
    </div>
@endsection
