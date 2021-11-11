@extends('layouts.auth')
@section('title', '登录')

@section('content')
    <div class="pattern-dots-md text-gray-300 absolute top-0 right-0 w-32 h-32 lg:w-48 lg:h-48 transform translate-x-16 translate-y-16"></div>
    <div class="pattern-dots-md text-gray-300 absolute bottom-0 left-0 w-32 h-32 lg:w-48 lg:h-48 transform -translate-x-16 -translate-y-16"></div>

    <div class="py-6 lg:py-0 w-full md:w-8/12 lg:w-6/12 xl:w-5/12 relative">
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full">
                <div class="sm:p-2 lg:px-6 lg:py-4 space-y-8">
                    <div class="text-center">
                        <h1 class="text-4xl text-gray-900 font-bold inline-flex items-center mb-1 space-x-3">
                            <svg class="hi-solid hi-cube-transparent inline-block w-8 h-8 text-indigo-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ config('app.name') }}</span>
                        </h1>
                    </div>
                    <form action="{{ route('login') }}" method="post" class="space-y-6">
                        <div hidden>
                            @csrf
                        </div>
                        <div class="space-y-1">
                            <label for="username" class="font-medium">用户名</label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                value="{{ old('username') }}"
                                class="block border rounded px-3 py-2 leading-6 w-full focus:ring focus:ring-opacity-50 {{ $errors->has('username') ? 'text-red-700 border-red-400 focus:border-red-500 focus:ring-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' }}"
                                placeholder="请输入用户名"
                            />
                            @error('username')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="password" class="font-medium">密码</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="block border rounded px-3 py-2 leading-6 w-full focus:ring focus:ring-opacity-50 {{ $errors->has('password') ? 'text-red-700 border-red-400 focus:border-red-500 focus:ring-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' }}"
                                placeholder="请输入密码"
                            />
                            @error('password')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none w-full px-3 py-2 leading-6 rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                                登录
                            </button>
                            <div class="space-y-2 sm:flex sm:items-center sm:justify-between sm:space-x-2 sm:space-y-0 mt-4">
                                <label class="flex items-center">
                                    <input type="checkbox" class="border border-gray-200 rounded h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                    <span class="ml-2">
                                        记住我
                                    </span>
                                </label>
                                <a href="javascript:void(0)" class="inline-block text-indigo-600 hover:text-indigo-400">忘记密码？</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-sm text-gray-500 text-center mt-6">
            <a class="font-medium text-indigo-600 hover:text-indigo-400" href="#" target="_blank">{{ config('app.name') }}</a> 由 <a class="font-medium text-indigo-600 hover:text-indigo-400" href="#" target="_blank">hipig</a> 设计与编码
        </div>
    </div>
@endsection
