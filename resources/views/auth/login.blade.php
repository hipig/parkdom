@extends('layouts.auth')
@section('title', '登录')

@section('content')
    <div class="pattern-dots-md text-gray-300 absolute top-0 right-0 w-32 h-32 lg:w-48 lg:h-48 transform translate-x-16 translate-y-16"></div>
    <div class="pattern-dots-md text-gray-300 absolute bottom-0 left-0 w-32 h-32 lg:w-48 lg:h-48 transform -translate-x-16 -translate-y-16"></div>

    <div class="py-6 lg:py-0 w-full md:w-8/12 lg:w-6/12 xl:w-4/12 relative">
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <div class="p-5 lg:p-6 flex-grow w-full">
                <div class="sm:p-2 lg:px-4 space-y-8">
                    <div class="text-center space-y-2">
                        <h1 class="text-4xl text-gray-900 font-bold inline-flex items-center">
                            Login
                        </h1>
                        <p class="text-gray-500">Welcome back.</p>
                    </div>
                    <form action="{{ route('login') }}" method="post" class="space-y-6">
                        <div hidden>
                            @csrf
                        </div>
                        <div class="space-y-1">
                            <label for="email" class="font-medium">{{ __('Email') }}</label>
                            <input
                                type="text"
                                id="email"
                                name="email"
                                value="{{ old('username') }}"
                                class="block border rounded px-3 py-2 leading-6 w-full focus:ring focus:ring-opacity-50 {{ $errors->has('username') ? 'text-red-700 border-red-400 focus:border-red-500 focus:ring-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' }}"
                                placeholder="{{ __('Email') }}"
                            />
                            @error('username')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="password" class="font-medium">{{ __('Password') }}</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="block border rounded px-3 py-2 leading-6 w-full focus:ring focus:ring-opacity-50 {{ $errors->has('password') ? 'text-red-700 border-red-400 focus:border-red-500 focus:ring-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' }}"
                                placeholder="{{ __('Password') }}"
                            />
                            @error('password')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-4">
                            <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none w-full px-3 py-2 leading-6 rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                                {{ __('Login') }}
                            </button>
                            <div class="space-y-2 sm:flex sm:items-center sm:justify-between sm:space-x-2 sm:space-y-0 mt-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember" class="border border-gray-200 rounded h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                                    <label for="remember" class="ml-2">
                                        Remember me
                                    </label>
                                </div>
                                <a href="javascript:void(0)" class="inline-block text-indigo-600 hover:text-indigo-400">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="py-4 px-5 lg:px-6 w-full text-sm text-center bg-gray-50">
                Don't have an account?
                <a class="font-medium text-indigo-600 hover:text-indigo-400" href="javascript:void(0)">Register</a>
            </div>
        </div>
        <div class="text-sm text-gray-500 text-center mt-6">
            © 2021 <a href="#" target="_blank" class="font-medium text-indigo-600 hover:text-indigo-400">{{ config('app.name') }}</a>. All rights reserved.
        </div>
    </div>
@endsection
