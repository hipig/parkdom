@extends('layouts.admin')
@section('title', '币种添加')

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('admin.dashboard') }}">仪表盘</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="javascript:;">系统设置</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('admin.settings.currencies.index') }}">币种</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>添加</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>币种添加</h3>
        </div>
        <div class="p-5 lg:p-6 flex-grow w-full">
            <form action="{{ route('admin.settings.currencies.store') }}" method="post" class="space-y-6">
                <div hidden>
                    @csrf
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="code" class="font-semibold py-2 md:w-1/5 flex-none md:mr-6 text-right"><span class="text-red-600 px-1">*</span>编码</label>
                    <input type="text" id="code" name="code" value="{{ old('code') }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full md:w-3/5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入编码">
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="prefix" class="font-semibold py-2 md:w-1/5 flex-none md:mr-6 text-right">前缀</label>
                    <input type="text" id="prefix" name="prefix" value="{{ old('prefix') }}" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full md:w-3/5 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="请输入前缀">
                </div>
                <div class="space-y-1 md:space-y-0 md:flex">
                    <label for="cover" class="font-semibold md:w-1/5 flex-none md:mr-6 text-right">状态</label>
                    <div class="w-full md:w-3/5 space-x-6">
                        @foreach(\App\Models\Currency::$statusMap as $key => $value)
                            <label class="inline-flex items-center space-x-2">
                                <input id="status" type="radio" name="status" value="{{ $key }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('status', \App\Models\Currency::STATUS_ENABLE) == $key ? 'checked' : '' }}>
                                <span>{{ $value }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="md:w-4/5 ml-auto pl-6 space-x-2">
                    <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                        确定
                    </button>
                    <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-4 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                        返回
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
