@extends('layouts.app')
@section('title', __('Account'))

@section('breadcrumb')
    <x-admin.breadcrumb.list>
        <x-admin.breadcrumb.item href="{{ route('dashboard') }}">{{ __('Dashboard') }}</x-admin.breadcrumb.item>
        <x-admin.breadcrumb.item>{{ __('Account') }}</x-admin.breadcrumb.item>
    </x-admin.breadcrumb.list>
@endsection

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <a href="{{ route('account.profile') }}" class="flex flex-col rounded shadow-sm bg-white overflow-hidden group">
            <div class="p-5 flex items-center justify-between space-x-4">
                <div class="flex items-center space-x-4">
                    <div class="p-1.5 text-indigo-600 bg-indigo-100 rounded-xl">
                        <x-heroicon-o-user class="w-6 h-6" />
                    </div>
                    <h3 class="text-gray-900 text-base sm:text-lg font-semibold">{{ __('Profile') }}</h3>
                </div>
                <div class="flex items-center text-gray-400 space-x-2">
                    <span class="group-hover:text-gray-500">{{ __('Update your profile information') }}</span>
                    <x-heroicon-s-chevron-right class="w-5 h-5"/>
                </div>
            </div>
        </a>
        <a href="{{ route('account.security') }}" class="flex flex-col rounded shadow-sm bg-white overflow-hidden group">
            <div class="p-5 flex items-center justify-between space-x-4">
                <div class="flex items-center space-x-4">
                    <div class="p-1.5 text-indigo-600 bg-indigo-100 rounded-xl">
                        <x-heroicon-o-lock-closed class="w-6 h-6" />
                    </div>
                    <h3 class="text-gray-900 text-base sm:text-lg font-semibold">{{ __('Security') }}</h3>
                </div>
                <div class="flex items-center text-gray-400 space-x-2">
                    <span class="flex-1 group-hover:text-gray-500">{{ __('Change your security information') }}</span>
                    <x-heroicon-s-chevron-right class="w-5 h-5"/>
                </div>
            </div>
        </a>
        <a href="{{ route('account.delete') }}" class="flex flex-col rounded shadow-sm bg-white overflow-hidden group">
            <div class="p-5 flex items-center justify-between space-x-4">
                <div class="flex items-center space-x-4">
                    <div class="p-1.5 text-red-600 bg-red-100 rounded-xl">
                        <x-heroicon-o-trash class="w-6 h-6" />
                    </div>
                    <h3 class="text-red-600 text-base sm:text-lg font-semibold">{{ __('Delete') }}</h3>
                </div>
                <div class="flex items-center text-gray-400 space-x-2">
                    <span class="group-hover:text-gray-500">{{ __('Delete your account and associated data') }}</span>
                    <x-heroicon-s-chevron-right class="w-5 h-5"/>
                </div>
            </div>
        </a>
    </div>
@endsection
