@extends('layouts.app')
@section('title', joinTitle([__('Security'), __('Account')]))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item href="{{ route('account.index') }}">{{ __('Account') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Security') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
            <h3>{{ __('Security') }}</h3>
        </div>
        <form action="{{ route('account.security.update') }}" method="post">
            <div class="p-5 lg:p-6 flex-grow w-full">
                @csrf
                <div class="space-y-6 md:w-2/3">
                    <div class="space-y-1">
                        <label for="password" class="text-gray-900 font-semibold"><span class="text-red-600 px-1">*</span>{{ __('Current Password') }}</label>
                        <input type="password" id="current_password" name="current_password" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Current password') }}">
                    </div>
                    <div class="space-y-1">
                        <label for="new_password" class="text-gray-900 font-semibold"><span class="text-red-600 px-1">*</span>{{ __('New Password') }}</label>
                        <input type="password" id="password" name="password" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('New Password') }}">
                    </div>
                    <div class="space-y-1">
                        <label for="password_confirmation" class="text-gray-900 font-semibold"><span class="text-red-600 px-1">*</span>{{ __('Confirm New Password') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" placeholder="{{ __('Confirm New Password') }}">
                    </div>
                </div>
            </div>
            <div class="py-3 px-5 lg:px-6 w-full bg-gray-50 space-x-2">
                <button type="submit" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    <span>{{ __('Submit') }}</span>
                </button>
                <button type="button" @click="window.history.back()" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <span>{{ __('Back') }}</span>
                </button>
            </div>
        </form>
    </div>
@endsection
